<?php

namespace Models\Companies;
use Models\Interfaces\FileConvertible;

class Company implements FileConvertible
{
    protected string $name;
    protected int $foundingYear;
    protected string $description;
    protected string $website;
    protected string $phone;
    protected string $industry;
    protected string $ceo;
    protected bool $isPubliclyTraded;
    protected string $country;
    protected string $founder;
    protected int $totalEmployees;

    public function __construct(
        string $name, int $foundingYear, string $description,
        string $website, string $phone, string $industry,
        string $ceo, bool $isPubliclyTraded, string $country,
        string $founder, int $totalEmployees
    )
    {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPubliclyTraded = $isPubliclyTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
    }

    public function toString(): string
    {
        return sprintf(
            "
            Name: %s\n
            FoundingYear: %d\n
            Description: %s\n
            Website: %s\n
            Phone: %s\n
            Industry: %s\n
            CEO: %s\n
            PublicityTrade?: %s\n
            Country: %s\n
            Founder: %s\n
            TotalEmployees: %s\n
            ",
        $this->name,
        $this->foundingYear,
        $this->description,
        $this->website,
        $this->phone,
        $this->industry,
        $this->ceo,
        $this->isPubliclyTraded ? 'true' : 'false',
        $this->country,
        $this->founder,
        $this->totalEmployees
        );
    }

    public function toHTML(): string
    {

        return sprintf(
            "
            <div class='user-card'>
                <div class='avatar'>SAMPLE</div>
                <h2>%s</h2>
                <p>FoundingYear: %d</p>
                <p>Description: %s</p>
                <p>Website: %s</p>
                <p>Phone: %s</p>
                <p>Industry: %s</p>
                <p>CEO: %s</p>
                <p>PublicityTrade?: %s</p>
                <p>Country: %s</p>
                <p>Founder: %s</p>
                <p>TotalEmployees: %s</p>
            </div>",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPubliclyTraded ? 'true' : 'false',
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toMarkdown(): string
    {
        return "## Company: {$this->name}
                 - FoundingYear: {$this->foundingYear}
                 - Description: {$this->description}
                 - Website: {$this->website}
                 - Phone: {$this->phone}
                 - Industry: {$this->industry}
                 - CEO: {$this->ceo}
                 - PublicityTrade: {$this->isPubliclyTraded}
                 - Country: {$this->country}
                 - Founder: {$this->founder}
                 - TotalEmployees: {$this->totalEmployees}";
    }

    public function toArray(): array
    {
        return [
            "name" => $this->name,
            "foundingYear" => $this->foundingYear,
            "description" => $this->description,
            "website" => $this->website,
            "phone" => $this->phone,
            "industry" => $this->industry,
            "ceo" => $this->ceo,
            "isPubliclyTraded" => $this->isPubliclyTraded ? 'true' : 'false',
            "country" => $this->country,
            "founder" => $this->founder,
            "totalEmployees" => $this->totalEmployees];
    }
}