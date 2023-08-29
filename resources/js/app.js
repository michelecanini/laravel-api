import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//costante di tutti i pulsanti di cancellazione
const deleteSubmitButton = document.querySelectorAll('.delete-project-form button[type="submit"]');

//ciclo di tutti i pulsanti di cancellazione
deleteSubmitButton.forEach((button) =>{

    //tutti i pulsanti attendono l'evento click
    button.addEventListener('click', (event) => {

        //no sottomissione form
        event.preventDefault();

        //recupero dell'html della modale
        const modal = document.getElementById('confirmProjectDelete');

        //istanza classe modal di bootstrap
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        //recupero del pulsante di cancellazione
        const buttonDelete = document.querySelector('.confirm-delete-button');

        //in attesa dell'evento click
        buttonDelete.addEventListener('click', ()=> {

            //sottomissione form
            button.parentElement.submit();
        });
    })
});


/*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2023 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    if (theme === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
      document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, span, label').forEach(el => el.classList.add('text-white'));
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
      document.querySelectorAll('h1, h2, h3, h4, h5, p, h6, span, label').forEach(el => el.classList.remove('text-white'));
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active use')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()