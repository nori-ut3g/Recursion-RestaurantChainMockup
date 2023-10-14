<?php

namespace Helpers;

use Faker\Factory;

use Models\Companies\Company;
use Models\Companies\RestaurantChain;
use Models\Users\User;
use Models\Users\Employee;
use Models\RestaurantLocation;

class RandomGenerator
{
    public static function user(): User
    {
        $faker = Factory::create();
        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }
    public static function users(int $min, int $max): array
    {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }

    public static function employee(): Employee
    {
        $faker = Factory::create();
        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->randomElement(['chef', 'cashier']),
            $faker->randomFloat(1, 15, 50),
            $faker->dateTimeBetween('-5 years'),
            $faker->words()
        );
    }

    public static function employees(int $min, int $max): array
    {
        $faker = Factory::create();
        $employees = [];
        $numOfEmployees = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::employee();
        }
        return $employees;
    }

    public static function restaurantLocation(): RestaurantLocation
    {
        $faker = Factory::create();
        return new RestaurantLocation(
            $faker->company(),
            $faker->streetAddress(),
            $faker->city(),
            $faker->state(),
            $faker->postcode(),
            self::employees(2, 3),
            $faker->boolean()
        );
    }

    public static function restaurantLocations(int $min, int $max): array
    {
        $faker = Factory::create();
        $restaurantLocations = [];
        $numOfRestaurantLocations = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantLocations; $i++) {
            $restaurantLocations[] = self::restaurantLocation();
        }
        return $restaurantLocations;
    }

    public static function restaurantChain(): RestaurantChain
    {
        $faker = Factory::create();
        return new RestaurantChain(
            $faker->company(),
            $faker->year(),
            $faker->text(100),
            $faker->companyEmail(),
            $faker->phoneNumber(),
            $faker->word(),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->randomNumber(4, false),
            $faker->randomNumber(),
            self::restaurantLocations(2,2),
            $faker->country(),
            $faker->boolean(),
            $faker->company()
        );
    }

    public static function restaurantChains(int $min, int $max): array
    {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfRestaurantLocations = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantLocations; $i++) {
            $restaurantChains[] = self::restaurantChain();
        }
        return $restaurantChains;
    }

    public static function company(): Company
    {
        $faker = Factory::create();
        return new Company(
            $faker->company(),
            $faker->year(),
            $faker->text(100),
            $faker->companyEmail(),
            $faker->phoneNumber(),
            $faker->word(),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->randomNumber(4, false)
        );
    }
}