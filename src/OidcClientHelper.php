<?php
namespace Amrita;

use Jumbojett\OpenIDConnectClient;
use Jumbojett\OpenIDConnectClientException;

class OidcClientHelper
{
    /**
     * @var string provider url
     */
    private $providerURL;

    /**
     * @var string arbitrary id value
     */
    private $clientID;

    /**
     * @var string arbitrary secret value
     */
    private $clientSecret;

    /**
     * @var string if we acquire an access token it will be stored here
     */
    protected $accessToken;

    /**
     * @var string if we acquire a refresh token it will be stored here
     */
    private $refreshToken;

    /**
     * @var array holds scopes
     */
    private $scopes = ['openid', 'profile', 'email', 'offline_access'];

    /**
     * @var int|null Response code from the server
     */
    private $responseCode;

    /**
     * @var array holds response types
     */
    private $responseTypes = ['code'];

    /**
     * @var string code challenge method
     */
    private $codeChallengeMethod = 'S256';

    /**
     * @var array holds token auth methods supported
     */
    private $tokenAuthMethodsSupported = ['client_secret_basic'];

    /**
     * @var array holds authentication parameters
     */
    private $authParams = ['response_mode' => 'query'];

    protected $oidcClient;
    private $redirectURL='http://localhost/OIDC/src/oidc.php';

    /**
     * @var
     */
    /**
     * Constructor.
     */
    public function __construct($providerURL, $clientID, $clientSecret)
    {
        $this->clientID = $clientID;
        $this->clientSecret = $clientSecret;
        $this->providerURL = $providerURL;
        $this->oidcClient = new OpenIDConnectClient($this->providerURL, $this->clientID, $this->clientSecret);
    }

    /**
     * @throws OpenIDConnectClientException
     */
    public function getAuth()
    {
        $this->oidcClient->setRedirectURL($this->redirectURL);
        $this->oidcClient->addScope($this->scopes);
        $this->oidcClient->setCodeChallengeMethod($this->codeChallengeMethod);
        $this->oidcClient->setResponseTypes($this->responseTypes);
        $this->oidcClient->addAuthParam($this->authParams);
        $this->oidcClient->setTokenEndpointAuthMethodsSupported($this->tokenAuthMethodsSupported);
        $this->oidcClient->setVerifyHost(false);
        $this->oidcClient->setVerifyPeer(false);
        $this->oidcClient->authenticate();
        $this->setAccessToken();
        $this->setRefreshToken();
    }

        /**
     * Get the access token.
     *
     * @return string
     */
    public function setAccessToken(): void
    {
        $this->accessToken = $this->oidcClient->getAccessToken();
    }

    /**
     * Get the access token.
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Set the refresh token.
     *
     */
    public function setRefreshToken()
    {
        $this->refreshToken = $this->oidcClient->getRefreshToken();
    }

    /**
     * Get the refresh token.
     *
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * Set new access token.
     * @throws OpenIDConnectClientException
     */
    public function setNewAccessToken()
    {
        $this->oidcClient->refreshToken($this->refreshToken);
        $this->setAccessToken();
    }
}
