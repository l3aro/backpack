import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
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

import Tagify from '@yaireo/tagify'
require('@yaireo/tagify/dist/tagify.css')

import Prism from 'prismjs'
require('prismjs/themes/prism.css')
import 'prismjs/components/prism-markup-templating'
import 'prismjs/components/prism-php'
import 'prismjs/components/prism-bash'

Alpine.plugin(focus)
Alpine.plugin(collapse)
window.Alpine = Alpine
window.flatpickr = flatpickr
window.createPopper = createPopper
window.Fancybox = Fancybox
window.SimpleMDE = SimpleMDE
window.AOS = AOS
window.markdownParse = parse
window.Tagify = Tagify
window.Prism = Prism
