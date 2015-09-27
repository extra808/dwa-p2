# P2: Password Generator

## Live URL
<https://p2.dwa15.cognize.org>

## Description
a site to generate passphrases using randomly chosen words with optional numbers and symbols.

## Demo
<https://youtu.be/L3Vzt-KAjcE>

## Details for teaching team
* Site configured to use self-signed certificate. HTTP access still allowed.
* On iOS devices, to copy the passphrase, tap once to automatically select it, tap a second time _on one of the selection handles_

## Outside code
* [bootstrap-sass](https://github.com/twbs/bootstrap-sass) Official Sass port of Bootstrap 
* [Bootstrap Navbar Template](http://getbootstrap.com/examples/navbar/) Example of Bootstrap navbar
* [Autoprefixer](https://github.com/postcss/autoprefixer) Plugin for [PostCSS](https://github.com/postcss/postcss); adds needed browser prefixes, removes old, prefixes no longer needed
* [symbol character list source](http://windows.microsoft.com/en-us/windows-vista/tips-for-creating-a-strong-password)
* Word list from Debian 'wamerican' dictionary file, massaged to remove words with non-ASCII characters, words with apostrophes, converted to all lower case, duplicates removed
* [Data form validation](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Forms/Data_form_validation) HTML5 capabilities for form validation feedback
* [Paletton Color Scheme Designer](http://paletton.com/#uid=12P0u0kcglL4Zvw8Eq6eXhmkwen)