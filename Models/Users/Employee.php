<?php

namespace Models\Users;

use DateTime;

class Employee extends User
{
    protected string $jobTitle;
    protected float $salary;
    protected DateTime $startDate;
    protected array $award;

    public function __construct(
        int $id, string $firstName, string $lastName,
        string $email, string $password, string $phoneNumber,
        string $address, DateTime $birthDate, DateTime $membershipExpirationDate,
        string $role, string $jobTitle, float $salary,
        DateTime $startDate, array $award
    )
    {
        parent::__construct(
            $id, $firstName, $lastName,
            $email, $password, $phoneNumber,
            $address, $birthDate, $membershipExpirationDate,
            $role
        );
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->award = $award;
    }

//    public function toString(): string
//    {
//        return springf(
//            "%s",
//            parent::toString(),
//            $this->jobTitle;
//            $this->salar;
//            $this->startDate;
//            $this->award = $award;
//        )
//    }

    public function stringArrToTable(array $awards): string
    {
        $awardRows = "";
        foreach ($awards as $awardItem) {
            $awardRows .= sprintf("<tr><td>- %s</td></tr>", $awardItem);
        }

        return "
            <table>
                <thead>
                    <tr><th>Awards</th></tr>
                </thead>
                <tbody>
                    $awardRows
                </tbody>
            </table>
        ";
    }
    public function toHTML(): string {
        $baseHtml = parent::toHTML();

        $additionalHtml = sprintf("
            <li class='list-group-item'> ID: %d, Job Title: %s, %s %s, Start Date: %s</li>
        ",
            $this->id,
            $this->jobTitle,
            $this->firstName,
            $this->lastName,
            $this->startDate->format('Y-m-d')
        );
        return $additionalHtml;
//        return preg_replace('/<\/div>$/i', $additionalHtml . '</div>', $baseHtml);
    }

    public function __toString(): string
    {
        return sprintf(
            "%s: %s %s",
            $this->jobTitle,
            $this->firstName,
            $this->lastName
        );
    }
}