<?php


namespace App\DTO;


class FormDTO
{
    private $property;
    private $option;
    private $value;

    /**
     * FormDTO constructor.
     * @param array $property
     * @param array $option
     * @param array $value
     */
    public function __construct(array $property = null, array $option = null, array $value = null)
    {
        $this->property = $property;
        $this->option = $option;
        $this->value = $value;
    }

    /**
     * @return array|null
     */
    public function getProperty(): ?array
    {
        return $this->property ? array_unique($this->property) : null;
    }

    /**
     * @param null $property
     */
    public function setProperty($property): void
    {
        $this->property = $property;
    }

    /**
     * @return array|null
     */
    public function getOption(): ?array
    {
        return $this->option;
    }

    /**
     * @param null $option
     */
    public function setOption($option): void
    {
        $this->option = $option;
    }

    /**
     * @return array|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function builtQuery(): string
    {
        $query = '';
        foreach ($this->property as $index => $value) {
            $query .= $value.':'.$this->option[$index].$this->value[$index].'+';
        }
        return rtrim($query,'+');
    }

}
