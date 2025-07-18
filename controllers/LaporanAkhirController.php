<?php

namespace PHPMaker2025\kkndanpkl;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\Routing\Attribute\Route;

class LaporanAkhirController extends ControllerBase
{
    // list
    #[Route("/laporanakhirlist[/{id_laporan}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "list.laporan_akhir")]
    public function list(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "LaporanAkhirList");
    }

    // add
    #[Route("/laporanakhiradd[/{id_laporan}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "add.laporan_akhir")]
    public function add(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "LaporanAkhirAdd");
    }

    // view
    #[Route("/laporanakhirview[/{id_laporan}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "view.laporan_akhir")]
    public function view(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "LaporanAkhirView");
    }

    // edit
    #[Route("/laporanakhiredit[/{id_laporan}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "edit.laporan_akhir")]
    public function edit(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "LaporanAkhirEdit");
    }

    // delete
    #[Route("/laporanakhirdelete[/{id_laporan}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "delete.laporan_akhir")]
    public function delete(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "LaporanAkhirDelete");
    }
}
