<?php

namespace App\Http\Controllers;

use App\Http\Resources\RepositoryResource;
use App\Models\Contributor;
use App\Models\Repository;

class OpensourceController extends Controller
{
    public function index()
    {
        $repositories = RepositoryResource::collection(
            Repository::getHighlightedPackages()
        )->resolve();

        $contributor = Contributor::first();

        return view('pages.open-source.index', compact('repositories', 'contributor'));
    }

    public function packages()
    {
        $repositories = RepositoryResource::collection(
            Repository::getAllPackages()
        )->resolve();

        return view('pages.open-source.packages', compact('repositories'));
    }

    public function projects()
    {
        $repositories = RepositoryResource::collection(
            Repository::getAllProjects()
        )->resolve();

        return view('pages.open-source.projects', compact('repositories'));
    }
}
