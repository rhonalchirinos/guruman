<?php

/**
 * 
 *  id	int	The id of the location.
 *  name	string	The name of the location.
 *  type	string	The type of the location.
 *  dimension	string	The dimension in which the location is located.
 *  residents	array (urls)	List of character who have been last seen in the location.
 *  url	string (url)	Link to the location's own endpoint.
 *  created	string	Time at which the location was created in the database.
 */

namespace Src\RickAndMorty\Domain\Model;

/**
 * @property int $id;
 * @property string $name;
 * @property string $type;
 * @property string $dimension;
 * @property array $residents;
 * @property string $url;
 * @property string $created;
 */
class Location
{
    private int $id;
    private string $name;
    private string $type;
    private string $dimension;
    private array $residents;
    private string $url;
    private string $created;

    public function __construct(...$args)
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? null;
        $this->type = $args['type'] ?? null;
        $this->dimension = $args['dimension'] ?? null;
        $this->residents = $args['residents'] ?? null;
        $this->url = $args['url'] ?? null;
        $this->created = $args['created'] ?? null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getDimension(): string
    {
        return $this->dimension;
    }

    public function setDimension(string $dimension): void
    {
        $this->dimension = $dimension;
    }

    public function getResidents(): array
    {
        return $this->residents;
    }

    public function setResidents(array $residents): void
    {
        $this->residents = $residents;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }
}
