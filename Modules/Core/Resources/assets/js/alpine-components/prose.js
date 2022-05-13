import { Fancybox } from '@fancyapps/ui'

const clipboardIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
  <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
</svg>`
const clipboardCheckIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
  <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
</svg>`

export default () => ({
    init() {
        Fancybox.bind(`#${this.$el.id} img`, {
            groupAll: true,
        })

        if (navigator.clipboard) {
            appendCopyButton(this.$el)
        }
    },
})

function appendCopyButton(context) {
    context.querySelectorAll(`pre`).forEach((el) => {
        const buttonCopy = document.createElement('button')
        buttonCopy.innerHTML = clipboardIcon
        buttonCopy.addEventListener('click', copyContent)
        el.appendChild(buttonCopy)
    })
}

async function copyContent(e) {
    const button = e.target.closest('button')
    const pre = button.closest('pre')
    const code = pre.querySelector('code')
    const content = code.innerText
    await navigator.clipboard.writeText(content)
    button.innerHTML = clipboardCheckIcon
    setTimeout(() => {
        button.innerHTML = clipboardIcon
    }, 2000)
}
