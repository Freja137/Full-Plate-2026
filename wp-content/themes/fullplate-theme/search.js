class Search {

    constructor() {
        // Finder elementerne fra header.php
        this.openButtons = document.querySelectorAll(".js-search-trigger")
        this.closeButton = document.querySelector(".search-overlay-close")
        this.searchOverlay = document.querySelector(".search-overlay")
        this.searchField = document.querySelector("#search-term")
        this.isOverlayOpen = false
        this.events()
    }

    // Registrerer events
    events() {
        // Åbner søgningen ved klik på søgefeltet i navigationen
        this.openButtons.forEach(button => {
            button.addEventListener("click", event => {
                event.preventDefault()
                this.openOverlay()
            })
        })

        // Lukker søgningen med krydset
        this.closeButton.addEventListener(
            "click",
            () => this.closeOverlay()
        )

        // Registrerer tastaturtryk
        document.addEventListener("keydown",
            event => this.keyPressDispatcher(event)
        )
    }

    // Åbner og lukker søgningen med tastaturet
    keyPressDispatcher(event) {
        const activeElement = document.activeElement
        const userIsWriting =
            activeElement.tagName === "INPUT" ||
            activeElement.tagName === "TEXTAREA" ||
            activeElement.isContentEditable

        // Åbner overlayet med S
        if (

            event.key.toLowerCase() === "s" &&
            !this.isOverlayOpen &&
            !userIsWriting

        ) {
            event.preventDefault()
            this.openOverlay()
        }

        // Lukker overlayet med Escape
        if (
            event.key === "Escape" &&
            this.isOverlayOpen
        ) {
            this.closeOverlay()
        }
    }

    // Åbner søgeoverlayet
    openOverlay() {
        this.searchOverlay.classList.add(
            "search-overlay--active"
        )
        this.searchOverlay.setAttribute("aria-hidden", "false")
        document.body.classList.add("body-no-scroll")
        setTimeout(
            () => this.searchField.focus(), 301)

        this.isOverlayOpen = true
    }

    // Lukker søgeoverlayet
    closeOverlay() {
        this.searchOverlay.classList.remove(
            "search-overlay--active"
        )

        this.searchOverlay.setAttribute("aria-hidden", "true")
        document.body.classList.remove("body-no-scroll")
        this.isOverlayOpen = false
    }
}

new Search()
