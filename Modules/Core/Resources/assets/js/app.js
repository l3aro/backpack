require('./bootstrap')
import select from './alpine-components/select'
import prose from './alpine-components/prose'

Alpine.data('select', select)
Alpine.data('prose', prose)
Alpine.start()

AOS.init()
Prism.highlightAll()
Turbo.start()