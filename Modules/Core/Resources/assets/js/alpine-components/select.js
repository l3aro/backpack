export default (options) => ({
    model: options.model,
    searchable: options.searchable,
    multiple: options.multiple,
    readonly: options.readonly,
    disabled: options.disabled,
    placeholder: options.placeholder,
    optionValue: options.optionValue,
    optionLabel: options.optionLabel,
    popover: false,
    search: '',
    selectedOptions: [],

    init() {
        this.initMultiSelect()

        this.$watch('popover', status => {
            if (status) {
                this.$nextTick(() => this.$refs.search?.focus())
            }
        })
        this.$watch('model', selected => this.syncSelected(selected))
        this.$watch('search', search => this.filterOptions(search?.toLowerCase()))
    },
    togglePopover() {
        if (this.readonly || this.disabled) return

        this.popover = !this.popover
        this.$refs.select.dispatchEvent(new Event(this.popover ? 'open' : 'close'))
    },
    closePopover() {
        this.popover = false
        this.$refs.select.dispatchEvent(new Event('close'))
    },
    isSelected(value) {
        if (this.multiple) {
            // eslint-disable-next-line
            return !!Object.values(this.model ?? []).find(option => option == value)
        }

        // eslint-disable-next-line
        return value == this.model
    },
    unSelect(value) {
        if (this.disabled || this.readonly) return

        // eslint-disable-next-line
        let index = this.selectedOptions.findIndex(option => option.value == value)
        this.selectedOptions.splice(index, 1)

        // eslint-disable-next-line
        index = this.model.findIndex(selected => selected == value)
        this.model.splice(index, 1)

        this.$refs.select.dispatchEvent(new Event('select'))
    },
    select(value) {
        if (this.disabled || this.readonly) return

        this.search = ''

        if (this.multiple) {
            this.model = Object.assign([], this.model)

            // eslint-disable-next-line
            const index = this.model.findIndex(selected => selected == value)

            if (~index) return this.unSelect(value)

            const { dataset: option } = this.getOptionElement(value)
            this.$refs.select.dispatchEvent(new Event('select'))
            this.selectedOptions.push(option)

            return this.model.push(value)
        }

        if (value === this.model) { value = null }

        this.model = value
        this.$refs.select.dispatchEvent(new Event('select'))
        this.closePopover()
    },
    clearModel() {
        const value = this.multiple ? [] : null
        this.model = value
        this.selectedOptions = []
        this.$refs.select.dispatchEvent(new Event('clear'))
    },
    isEmptyModel() {
        if (this.multiple) {
            return this.model?.length === 0
        }

        // eslint-disable-next-line
        return this.model == null
    },
    getOptionElement(value) {
        return this.$refs.optionsContainer.querySelector(`[data-value='${value}']`)
    },
    getPlaceholderText() {
        if (this.model?.toString().length) return null

        return this.placeholder
    },
    getValueText() {
        if (this.multiple || !this.model?.toString().length) return null

        return this.decodeSpecialChars(this.getOptionElement(this.model).dataset.label)
    },
    isAvailableInList(search, option) {
        const label = this.decodeSpecialChars(option.dataset.label)
        const value = this.decodeSpecialChars(option.dataset.value)

        return label.toLowerCase().includes(search)
            || value.toLowerCase().includes(search)
    },
    filterOptions(search) {
        const options = [...this.$refs.optionsContainer.children]
        options.map(option => {
            if (this.isAvailableInList(search.toLowerCase(), option)) {
                option.classList.remove('hidden')
            } else {
                option.classList.add('hidden')
            }
        })
    },
    initMultiSelect() {
        if (!this.multiple) return

        if (typeof this.model === 'string') {
            this.model = []
        }

        this.model?.map(selected => {
            const { dataset: option } = this.getOptionElement(selected)
            this.selectedOptions.push(option)
        })
    },
    modelWasChanged() {
        return this.model?.toString()
            !== this.selectedOptions.map(option => option.value).toString()
    },
    syncSelected() {
        if (!this.multiple || !this.modelWasChanged()) return

        this.selectedOptions = this.model?.map(option => {
            return this.getOptionElement(option).dataset
        }) ?? []
    },
    decodeSpecialChars(text) {
        const textarea = document.createElement('textarea')
        textarea.innerHTML = text

        return textarea.value
    },
    getFocusables() { return [...this.$el.querySelectorAll('li, input')] },
    getFirstFocusable() { return this.getFocusables().shift() },
    getLastFocusable() { return this.getFocusables().pop() },
    getNextFocusable() { return this.getFocusables()[this.getNextFocusableIndex()] || this.getFirstFocusable() },
    getPrevFocusable() { return this.getFocusables()[this.getPrevFocusableIndex()] || this.getLastFocusable() },
    getNextFocusableIndex() { return (this.getFocusables().indexOf(document.activeElement) + 1) % (this.getFocusables().length + 1) },
    getPrevFocusableIndex() { return Math.max(0, this.getFocusables().indexOf(document.activeElement)) - 1 }
})