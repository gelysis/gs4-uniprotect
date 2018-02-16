GS4 UNIPROTECT
==============

SilverStripe 4 Uniprotect Form Field Module
-------------------------------------------

Copyright ©2018, Andreas Gerhards andreas@gelysis.net.
All rights reserved. / Alle Rechte vorbehalten. / Tous droits réservés.

# LICENSE
The Gs4Uniprotect module is open source and licensed as [BSD-3-Clause](http://opensource.org/licenses/BSD-3-Clause).

Please consult `LICENSE.md` for further details.

# LIZENZ
Das Gs4Uniprotect-Modul ist Open Source und unter der [BSD-3-Klausel](http://opensource.org/licenses/BSD-3-Clause) lizensiert.

Bitte lesen sie `LICENSE.md` für weitergehende Informationen.

# SYSTEM REQUIREMENTS
Requires PHP 5.6 (7.1 recommended) or later.


# DESCRIPTION
This package is a optional module for SilverStripe 4. It provides a hidden FormField which allows form to validate for 
non-bot submissions by checking if the value in that field is correct.

# INSTALLATION
* Use packagist dependency: `gelysis/gs4-uniprotect`.

# USAGE

## Standalone Field
If you want to use UniProtect field by itself, you can simply just include it as a field in your form.

    $uniprotectField = new Gs4Uniprotect\UniProtectField('MyUniProtect');

## Integration with Spamprotection
You can use it to protect any built informs on your website, including user comments in the 
[`Blog`](https://github.com/silverstripe/silverstripe-blog) module. Example for `mysite/_config/config.yml`:

    FormSpamProtectionExtension:
        default_spam_protector: 'UniProtectProtector'

Then once you have setup this config you will need to include the spam protector field as per the instructions on the 
[`SpamProtection`](https://github.com/silverstripe/silverstripe-spamprotection) module page.

# QUESTIONS AND FEEDBACK
Please contact the author.

# RELEASE INFORMATION
Gs4Uniprotect 0.9.5
2018-02-16

# UPDATES
Please see `CHANGELOG.md`.
