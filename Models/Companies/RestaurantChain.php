<?php

namespace Models\Companies;
use Models\RestaurantLocation;

class RestaurantChain extends Company
{
    private string $id;
    protected int $chainId;
    protected array $restaurantLocations;
    protected string $cuisineType;
    protected int $numberOfLocations;
    protected bool $hasDriveThru;
    protected string $parentCompany;

    public function __construct(
        string $name, int $foundingYear, string $description,
        string $website, string $phone, string $industry,
        string $ceo, bool $isPubliclyTraded, string $country,
        string $founder, int $totalEmployees,
        int $chainId, array $restaurantLocations, string $cuisineType,
        bool $hasDriveThru, string $parentCompany
    )
    {
        parent::__construct(
            $name, $foundingYear, $description,
            $website, $phone, $industry,
            $ceo, $isPubliclyTraded, $country,
            $founder, $totalEmployees
        );
        $this->id = $this->sanitizeHtmlId(uniqid($name. '-'));
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = count($restaurantLocations);
        $this->hasDriveThru = $hasDriveThru;
        $this->parentCompany = $parentCompany;
    }
    public function sanitizeHtmlId($str): string
    {
        return preg_replace(
            '/[^a-zA-Z0-9\-_:.]/',
            '',
            ltrim($str, '0123456789')
        );
    }

    public function toString(): string
    {
        return parent::toString().sprintf(
            "
            ChainID: %d\n
            RestaurantLocations: %s\n
            CuisineType: %s\n
            NumberOfLocations: %d\n
            ParentCompany: %s\n",
            $this->chainId,
            implode(",", $this->restaurantLocations),
            $this->cuisineType,
            $this->numberOfLocations,
            $this->parentCompany
            );
    }

    public function getRestaurantLocationHTML(): string
    {
        return implode(
            ' ',
            array_map(function (RestaurantLocation $rl) {
                return $rl->toHTML();
            }, $this->restaurantLocations));
    }


    public function toHTML(): string
    {
        return "
        <div class='container mt-5'>
            <h1 class='mb-4 text-center'>Restaurant Chain {$this->name}</h1>
            <div class='card mb-4'>
                <div class='card-header'>Restaurant Chain Information</div>
                <div class='card-body' id='restaurant-chain-info-{$this->id}'>
                    {$this->getRestaurantLocationHTML()}
                </div>
            </div>
        ";
    }
}