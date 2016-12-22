<!--toc=users-->
# SAML
The CMS can be configured to use SAML as its authentication provider. 

> Security Assertion Markup Language (SAML, pronounced sam-el) is an XML-based, open-standard data format for 
> exchanging authentication and authorization data between parties, in particular, between an identity provider 
> and a service provider.
> - Wikipedia

SAML integration is enabled via the `settings.php` file in the CMS installation - at a later date a GUI may be 
provided. If Docker has been used `settings.php` will not be accessible, however it is possible to create a 
`settings-custom.php` file in the `/custom` mount point. The below configuration can be added to that file instead.

The purpose of the integration is to configure a SAML enabled IdP (identity provider) for authentication with the
[[PRODUCTNAME]] CMS.

A user already authenticated with the IdP will automatically be logged into the CMS. If the user does not exist they 
will optionally be created with a set of default credentials.

## Configuration
SAML integration is configured in the `settings.php` file of the CMS installation. This file can be found in your
`/web` folder.

There are two sections to adjust, the `$authentication` middleware and the `$samlSettings` configuration array.

### Middleware
The authentication middleware should be changed to `SAMLAuthentication`, shown below:

``` php
$authentication = new \Xibo\Middleware\SAMLAuthentication();
```

### SAML Settings
The SAML settings array contains all the necessary information for the CMS to connect and use a SAML enabled IdP. An 
example settings file can be seen below.

The workflow section of the configuration is used to determine the mapping between the IdP and the CMS and whether
the CMS allows JIT provisioning. With JIT provisioning enabled users that visit the CMS who do not currently have 
an account are automatically created.

If *single logout* is disabled selecting logout in the CMS won't have any effect as the user will be immediately
logged in again on the next request.

Further explanation of the SAML specific settings can be found at: https://github.com/onelogin/php-saml#settings

``` php
$samlSettings = array (
   'workflow' => array(
        // Enable/Disable Just-In-Time provisioning
        'jit' => true,
        // Attribute to identify the user 
        'field_to_identify' => 'UserName',   // Alternatives: UserID, UserName or email
        // Default libraryQuota assigned to the created user by JIT
        'libraryQuota' => 1000,
        // Initial User Group
        'group' => 'Users',
        // Home Page
        'homePage' => 'dashboard',
        // Enable/Disable Single Logout
        'slo' => true,
        // Attribute mapping between XIBO-CMS and the IdP
        'mapping' => array (
            'UserID' => '',
            'usertypeid' => '',
            'UserName' => 'uid',
            'email' => 'mail',
            'ref1' => '',
            'ref2' => '',
            'ref3' => '',
            'ref4' => '',
            'ref5' => ''
        )
    ),
   // Settings for the PHP-SAML toolkit. 
   // See documentation: https://github.com/onelogin/php-saml#settings 
   'strict' => false,
   'debug' => true,
   'idp' => array (
            'entityId' => 'https://idp.example.com/simplesaml/saml2/idp/metadata.php',
            'singleSignOnService' => array (
                'url' => 'http://idp.example.com/simplesaml/saml2/idp/SSOService.php',
            ),
            'singleLogoutService' => array (
                'url' => 'http://idp.example.com/simplesaml/saml2/idp/SingleLogoutService.php',
            ),
            'x509cert' => 'MIICbDCCAdWgAwIBAgIBADANBgkqhkiG9w0BAQ0FADBTMQswCQYDVQQGEwJ1czETMBEGA1UECAwKQ2FsaWZvcm5pYTEVMBMGA1UECgwMT25lbG9naW4gSW5jMRgwFgYDVQQDDA9pZHAuZXhhbXBsZS5jb20wHhcNMTQwOTIzMTIyNDA4WhcNNDIwMjA4MTIyNDA4WjBTMQswCQYDVQQGEwJ1czETMBEGA1UECAwKQ2FsaWZvcm5pYTEVMBMGA1UECgwMT25lbG9naW4gSW5jMRgwFgYDVQQDDA9pZHAuZXhhbXBsZS5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAOWA+YHU7cvPOrBOfxCscsYTJB+kH3MaA9BFrSHFS+KcR6cw7oPSktIJxUgvDpQbtfNcOkE/tuOPBDoech7AXfvH6d7Bw7xtW8PPJ2mB5Hn/HGW2roYhxmfh3tR5SdwN6i4ERVF8eLkvwCHsNQyK2Ref0DAJvpBNZMHCpS24916/AgMBAAGjUDBOMB0GA1UdDgQWBBQ77/qVeiigfhYDITplCNtJKZTM8DAfBgNVHSMEGDAWgBQ77/qVeiigfhYDITplCNtJKZTM8DAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBDQUAA4GBAJO2j/1uO80E5C2PM6Fk9mzerrbkxl7AZ/mvlbOn+sNZE+VZ1AntYuG8ekbJpJtG1YfRfc7EA9mEtqvv4dhv7zBy4nK49OR+KpIBjItWB5kYvrqMLKBa32sMbgqqUqeF1ENXKjpvLSuPdfGJZA3dNa/+Dyb8GGqWe707zLyc5F8m',
        ),
   'sp' => array (
        'entityId' => 'http://xibo-cms.example.com/saml/metadata',
        'assertionConsumerService' => array (
            'url' => 'http://xibo-cms.example.com/saml/acs',
        ),
        'singleLogoutService' => array (
            'url' => 'http://xibo-cms.example.com/saml/sls',
        ),
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:emailAddress',
        'x509cert' => '',
        'privateKey' > '',
    ),
    'security' => array (
        'nameIdEncrypted' => false,
        'authnRequestsSigned' => false,
        'logoutRequestSigned' => false,
        'logoutResponseSigned' => false,
        'signMetadata' => false,
        'wantMessagesSigned' => false,
        'wantAssertionsSigned' => false,
        'wantAssertionsEncrypted' => false,
        'wantNameIdEncrypted' => false,
    )
);
```