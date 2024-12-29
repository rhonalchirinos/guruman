<?php

namespace Src\RickAndMorty\Domain\Model;

/**
 * id	int	The id of the character.
 * name	string	The name of the character.
 * status	string	The status of the character ('Alive', 'Dead' or 'unknown').
 * species	string	The species of the character.
 * type	string	The type or subspecies of the character.
 * gender	string	The gender of the character ('Female', 'Male', 'Genderless' or 'unknown').
 * origin	object	Name and link to the character's origin location.
 * location	object	Name and link to the character's last known location endpoint.
 * image	string (url)	Link to the character's image. All images are 300x300px and most are medium shots or portraits since they are intended to be used as avatars.
 * episode	array (urls)	List of episodes in which this character appeared.
 * url	string (url)	Link to the character's own URL endpoint.
 * created	string	Time at which the character was created in the database.
 */

/**
 * @property int $id;
 * @property string $name;
 * @property string $status;
 * @property string $species;
 * @property string $type;
 * @property string $gender;
 * @property object $origin;
 * @property object $location;
 * @property string $image;
 * @property array $episode;
 * @property string $url;
 * @property string $created;
 */
class Character
{
    private int $id;
    private string $name;
    private string $status;
    private string $species;
    private string $type;
    private string $gender;
    private array $origin;
    private array $location;
    private string $image;
    private array $episode;
    private string $url;
    private string $created;

    public function __construct(...$args)
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? null;
        $this->status = $args['status'] ?? null;
        $this->species = $args['species'] ?? null;
        $this->type = $args['type'] ?? null;
        $this->gender = $args['gender'] ?? null;
        $this->origin = $args['origin'] ?? null;
        $this->location = $args['location'] ?? null;
        $this->image = $args['image'] ?? null;
        $this->episode = $args['episode'] ?? null;
        $this->url = $args['url'] ?? null;
        $this->created = $args['created'] ?? null;
    }

    // Getters

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getOrigin(): array
    {
        return $this->origin;
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getEpisode(): array
    {
        return $this->episode;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    // Setters

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setSpecies(string $species): void
    {
        $this->species = $species;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function setOrigin(array $origin): void
    {
        $this->origin = $origin;
    }

    public function setLocation(array $location): void
    {
        $this->location = $location;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setEpisode(array $episode): void
    {
        $this->episode = $episode;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }
}
