<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

/**
 * Class Contact.
 */
class Contact extends Field
{
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $firstname;
    /**
     * @var string
     */
    protected $gender;
    /**
     * @var string
     */
    protected $initials;
    /**
     * @var string
     */
    protected $lastname;
    /**
     * @var string
     */
    protected $legalId;
    /**
     * @var string
     */
    protected $mobile;
    /**
     * @var string
     */
    protected $phone;
    /**
     * @var string
     */
    protected $positionOccupied;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $workPhone;

    /**
     * @ return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @ return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @ return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @ return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @ return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @ return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @ return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getInitials()
    {
        return $this->initials;
    }

    public function getLegalId()
    {
        return $this->legalId;
    }

    public function getPositionOccupied()
    {
        return $this->positionOccupied;
    }

    public function getWorkPhone()
    {
        return $this->workPhone;
    }

    public function setInitials($initials)
    {
        $this->initials = $initials;

        return $this;
    }

    public function setLegalId($legalId)
    {
        $this->legalId = $legalId;

        return $this;
    }

    public function setPositionOccupied($positionOccupied)
    {
        $this->positionOccupied = $positionOccupied;

        return $this;
    }

    public function setWorkPhone($workPhone)
    {
        $this->workPhone = $workPhone;

        return $this;
    }
}
