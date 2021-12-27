require('./bootstrap')
import select from './alpine-components/select'

Alpine.data('select', select)
Alpine.start()

AOS.init()