class BackToTop {
  constructor (el) {
    this.scrollToTopButton = el
    this.initButtonToggle()
  }

  initButtonToggle() {
    window.addEventListener('scroll', this.scrollFunc)
  }

  initButtonClicker() {
    this.scrollToTopButton.addEventListener('click', e => {
      e.preventDefault()
      scrollToTop()
    })

    const scrollToTop = () => {
      // Let's set a variable for the number of pixels we are from the top of the document.
      const c = document.documentElement.scrollTop || document.body.scrollTop

      if (c > 0) {
        window.scroll({
          top: 0,
          behavior: 'smooth',
        })
      }

      // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
      // We'll also animate that scroll with requestAnimationFrame:
      // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
      // if (c > 0) {
      // window.requestAnimationFrame(scrollToTop)
      // ScrollTo takes an x and a y coordinate.
      // Increase the '10' value to get a smoother/slower scroll!
      // window.scrollTo(0, c - c / 10)
      // }
    }
  }

  scrollFunc = () => {
    // Get the current scroll value
    const y = window.scrollY

    if (y > 100) {
      this.scrollToTopButton.classList.remove('hidden')
      this.initButtonClicker()
    } else {
      this.scrollToTopButton.classList.add('hidden')
    }
  }
}

const backToTop = {
  init () {
    // TODO: Make reusable
    // Set a variable for our button element.
    const wrapperEl = document.getElementById('backTop')
    if (wrapperEl !== null) {
      // window.addEventListener('scroll', scrollFunc)
      const backTop = new BackToTop(wrapperEl) // eslint-disable-line no-unused-vars
    }
  },
}

export default backToTop
