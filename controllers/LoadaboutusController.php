<?php

namespace PHPMaker2025\kkndanpkl;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * loadaboutus controller
 */
class LoadaboutusController extends ControllerBase
{
    // custom
    #[Route("/loadaboutus[/{params:.*}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "custom.loadaboutus")]
    public function custom(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "Loadaboutus");
    }
}
