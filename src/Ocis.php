<?php
namespace Amrita;

use Jumbojett\OpenIDConnectClientException;



class Ocis
{

    protected const CLIENT_ID = 'xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69';
    protected const CLIENT_SECRET = 'UBntmLjC2yYCeHwsyj73Uwo9TAaecAetRwMw0xYcvNL9yRdLSUi0hUAHfvCHFeFh';
    protected const IDP = 'https://localhost:9200';

    public OidcClientHelper $oidcHelper;

    private static Ocis $ocis;

    private function __construct()
    {
        $this->oidcHelper = new OidcClientHelper(self::IDP, self::CLIENT_ID, self::CLIENT_SECRET);
    }

    public static function getInstance(): Ocis{
        if(!isset(self::$ocis)) {
            self::$ocis = new Ocis();
            return self::$ocis;
        }
        return self::$ocis;
    }

    /**
     * @throws OpenIDConnectClientException
     */
    public function getAuth()
    {
        $this->oidcHelper->getAuth();
    }

    public function getAccessToken(): string
    {
        return $this->oidcHelper->getAccessToken();
    }

    public function getRefreshToken(): string
    {
        return $this->oidcHelper->getRefreshToken();
    }
}
