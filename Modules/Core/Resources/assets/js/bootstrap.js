import Alpine from 'alpinejs'
import trap from '@alpinejs/trap'

import flatpickr from 'flatpickr'
import 'flatpickr/dist/flatpickr.min.css'

import { createPopper } from '@popperjs/core'

import { Fancybox } from "@fancyapps/ui"
import "@fancyapps/ui/dist/fancybox.css"

import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css'

import AOS from 'aos'
require('aos/dist/aos.css')

Alpine.plugin(trap)
window.Alpine = Alpine
window.flatpickr = flatpickr
window.createPopper = createPopper
window.Fancybox = Fancybox
window.Editor = Editor
window.AOS = AOS