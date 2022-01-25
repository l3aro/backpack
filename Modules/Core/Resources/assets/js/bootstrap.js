import Alpine from 'alpinejs'
import trap from '@alpinejs/trap'
import collapse from '@alpinejs/collapse'

import flatpickr from 'flatpickr'
import 'flatpickr/dist/flatpickr.min.css'

import { createPopper } from '@popperjs/core'

import { Fancybox } from "@fancyapps/ui"
import "@fancyapps/ui/dist/fancybox.css"

import AOS from 'aos'
require('aos/dist/aos.css')

require('livewire-sortable')

import SimpleMDE from 'simplemde'
require('simplemde/dist/simplemde.min.css')

import { parse } from 'marked'

Alpine.plugin(trap)
Alpine.plugin(collapse)
window.Alpine = Alpine
window.flatpickr = flatpickr
window.createPopper = createPopper
window.Fancybox = Fancybox
window.SimpleMDE = SimpleMDE
window.AOS = AOS
window.markdownParse = parse