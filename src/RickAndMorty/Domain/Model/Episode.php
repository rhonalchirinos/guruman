<?php

/**
 * Key	Type	Description
 * id	int	The id of the episode.
 * name	string	The name of the episode.
 * air_date	string	The air date of the episode.
 * episode	string	The code of the episode.
 * characters	array (urls)	List of characters who have been seen in the episode.
 * url	string (url)	Link to the episode's own endpoint.
 * created	string	Time at which the episode was created in the database.
 */

namespace Src\RickAndMorty\Domain\Model;

/**
 * @property int $id The id of the episode.
 * @property string $name The name of the episode.
 * @property string $airDate The air date of the episode.
 * @property string $episodeCode The code of the episode.
 * @property array $characters List of characters who have been seen in the episode.
 * @property string $url Link to the episode's own endpoint.
 * @property string $created Time at which the episode was created in the database.
 */
class Episode
{
    private int $id;
    private string $name;
    private string $airDate;
    private string $episodeCode;
    private array $characters;
    private string $url;
    private string $created;

    /**
     * Constructor de la clase Episode.
     *
     * @param array $args Array asociativo con las propiedades del episodio.
     */
    public function __construct(...$args)
    {
        $this->id = $args['id'] ?? 0;
        $this->name = $args['name'] ?? '';
        $this->airDate = $args['air_date'] ?? '';
        $this->episodeCode = $args['episode'] ?? '';
        $this->characters = $args['characters'] ?? [];
        $this->url = $args['url'] ?? '';
        $this->created = $args['created'] ?? '';
    }

    // Getters

    /**
     * Obtiene el ID del episodio.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre del episodio.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Obtiene la fecha de emisión del episodio.
     *
     * @return string
     */
    public function getAirDate(): string
    {
        return $this->airDate;
    }

    /**
     * Obtiene el código del episodio.
     *
     * @return string
     */
    public function getEpisodeCode(): string
    {
        return $this->episodeCode;
    }

    /**
     * Obtiene la lista de personajes que aparecen en el episodio.
     *
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * Obtiene la URL del episodio.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Obtiene la fecha de creación del episodio en la base de datos.
     *
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    // Setters

    /**
     * Establece el ID del episodio.
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Establece el nombre del episodio.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Establece la fecha de emisión del episodio.
     *
     * @param string $airDate
     */
    public function setAirDate(string $airDate): void
    {
        $this->airDate = $airDate;
    }

    /**
     * Establece el código del episodio.
     *
     * @param string $episodeCode
     */
    public function setEpisodeCode(string $episodeCode): void
    {
        $this->episodeCode = $episodeCode;
    }

    /**
     * Establece la lista de personajes que aparecen en el episodio.
     *
     * @param array $characters
     */
    public function setCharacters(array $characters): void
    {
        $this->characters = $characters;
    }

    /**
     * Establece la URL del episodio.
     *
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * Establece la fecha de creación del episodio en la base de datos.
     *
     * @param string $created
     */
    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    /**
     * 
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'air_date' => $this->getAirDate(),
            'episode' => $this->getEpisodeCode(),
            'characters' => $this->getCharacters(),
            'url' => $this->getUrl(),
            'created' => $this->getCreated(),
        ];
    }
}
