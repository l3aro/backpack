import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'

import flatpickr from 'flatpickr'
import 'flatpickr/dist/flatpickr.min.css'

import { createPopper } from '@popperjs/core'

import { Fancybox } from '@fancyapps/ui'
import '@fancyapps/ui/dist/fancybox.css'

import AOS from 'aos'
import 'aos/dist/aos.css'

import 'livewire-sortable'

// import SimpleMDE from 'simplemde'
// import 'simplemde/dist/simplemde.min.css'

import EasyMDE from 'easymde'
import 'easymde/dist/easymde.min.css'

import { parse } from 'marked'

import Tagify from '@yaireo/tagify'
import '@yaireo/tagify/dist/tagify.css'

import Prism from 'prismjs'
// import 'prismjs/themes/prism-tomorrow.css'
import '../css/prism-onedark.css'
import 'prismjs/components/prism-markup-templating'
import 'prismjs/components/prism-php'
import 'prismjs/components/prism-bash'
import Turbo from 'turbolinks'

Alpine.plugin(focus)
Alpine.plugin(collapse)
window.Alpine = Alpine
window.flatpickr = flatpickr
window.createPopper = createPopper
window.Fancybox = Fancybox
window.SimpleMDE = EasyMDE
window.AOS = AOS
window.markdownParse = parse
window.Tagify = Tagify
window.Prism = Prism
window.Turbo = Turbo