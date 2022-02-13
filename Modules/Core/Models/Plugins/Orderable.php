<?php

namespace Modules\Core\Models\Plugins;

use ArrayAccess;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Modules\Core\Models\Scopes\PriorityScope;

trait Orderable
{
    public static function bootOrderable()
    {
        static::creating(function ($model) {
            if ($model->shouldBeOrdered()) {
                $model->setupOrder();
            }
        });

        static::addGlobalScope(new PriorityScope);
    }

    protected function setupOrder(): void
    {
        $orderColumn = $this->getOrderColumn();
        $this->$orderColumn = $this->getNextOrder();
    }

    protected function getNextOrder(): int
    {
        $currentOrder = (int) (static::query()->max($this->getOrderColumn()) ?? 0);
        return $currentOrder + 1;
    }

    protected function shouldBeOrdered(): bool
    {
        return $this->orderable['order_when_creating'] ?? true;
    }

    public function getOrderColumn(): string
    {
        return $this->orderable['order_column'] ?? 'priority';
    }

    public static function setNewOrder($ids): void
    {
        if (!is_array($ids) && !$ids instanceof ArrayAccess) {
            throw new InvalidArgumentException('You must pass an array or ArrayAccess object to setNewOrder');
        }
        $orderColumn = (new static)->getOrderColumn();
        $oldPositions = static::query()->whereIn('id', $ids)->get(['id', $orderColumn]);
        DB::beginTransaction();
        try {
            foreach ($ids as $index => $id) {
                $oldItem = $oldPositions[$index];
                if ($oldItem->id === $id) {
                    continue;
                }
                $swapItem = static::query()->find($id);
                $swapItem->update([$orderColumn => $oldItem->$orderColumn]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
