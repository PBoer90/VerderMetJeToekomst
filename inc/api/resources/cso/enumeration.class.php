<?php

class Api_Resources_CSO_Enumeration
{
    /**
     * @var array $educations Array with all the educations
     * TODO - GET DATA DYNAMICALLY
     */
    private $educations = array(
        'HBO' => 'CWD.08',
        'MBO' => 'CWD.12'
    );

    /**
     * @var array $regions Array with all the regions
     * TODO - GET DATA DYNAMICALLY
     */
    private $regions = array(
        'Gelderland' => 'BRG.0210',
        'Flevoland' => 'BRG.0212',
        'Utrecht' => 'BRG.0214',
        'Noord-Holland' => 'BRG.0216',
        'Zuid-Holland' => 'BRG.0218',
        'Zeeland' => 'BRG.0220',
        'Noord-Brabant' => 'BRG.0222',
        'Caribisch Nederland' => 'BRG.0226'
    );

    /**
     * @var array $branches Array with all the branches
     * TODO - GET DATA DYNAMICALLY
     */
    private $branches = array(
        'Administratief/Secretarieel' => 'CVG.02',
        'Fiscaal' => 'CVG.0602',
        'Auditing/Accountancy' => 'CVG.0604',
        'Financieel/Economisch' => 'CVG.06',
        'ICT' => 'CVG.08',
        'Facilitair/dienstverlening' => 'CVG.09',
        'Juridisch' => 'CVG.10',
        'Medisch/verzorging' => 'CVG.12',
        'Onderzoek/wetenschap' => 'CVG.14',
        'Onderwijs/opleiding' => 'CVG.15',
        'Opslag/vervoer/logistiek' => 'CVG.16',
        'Personeel en organisatie' => 'CVG.18',
        'Reclame/communicatie/marketing/PR/voorl.' => 'CVG.20',
        'Volkshuisvesting' => 'CVG.2202',
        'Sport/recreatie' => 'CVG.2204',
        'Sociaal/maatschappelijk/welzijn' => 'CVG.22',
        'Techniek/productie' => 'CVG.24',
        'Inkoop/verkoop' => 'CVG.26',
        'Inkoop' => 'CVG.2602',
        'Verkoop' => 'CVG.2604',
        'Agrarisch' => 'CVG.27',
        'Natuur/milieu' => 'CVG.28',
        'Stedebouwkundig/ruimtelijke ordening' => 'CVG.29',
        'Orde/vrede/veiligheid' => 'CVG.31',
        'Documentatie en Informatievoorziening' => 'CVG.32'
    );

    /**
     * Returns the education code for the given education name
     *
     * @param string $name The education name
     * @return mixed The education code, if we can find the matching education else false
     */
    public function getEducationCode($name)
    {
        if(isset($this->educations[$name]))
        {
            return $this->educations[$name];
        }
        else
        {
            return false;
        }
    }

    /**
     * Returns all the educations we got
     *
     * @return array Educations
     */
    public function getEducations()
    {
        return array_keys($this->educations);
    }

    /**
     * Returns the region code for the given region name
     *
     * @param string $name The region name
     * @return mixed The region code, if we can find the matching region else false
     */
    public function getRegionCode($name)
    {
        if(isset($this->regions[$name]))
        {
            return $this->regions[$name];
        }
        else
        {
            return false;
        }
    }

    /**
     * Returns all the regions we got
     *
     * @return array Regions
     */
    public function getRegions()
    {
        $regions = array_keys($this->regions);

        return $regions;
    }

    /**
     * Returns the branch code for the given branch name
     *
     * @param string $name The branch name
     * @return mixed The branch code, if we can find the matching branch else false
     */
    public function getBranchCode($name)
    {
        if(isset($this->branches[$name]))
        {
            return $this->branches[$name];
        }
        else
        {
            return false;
        }
    }

    /**
     * Returns all the branches we got
     *
     * @return array Branches
     */
    public function getBranches()
    {
        return array_keys($this->branches);
    }
}