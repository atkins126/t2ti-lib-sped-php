<?php
/*******************************************************************************
Title: T2Ti ERP Fenix                                                                
Description: Model relacionado à tabela [NFE_TRANSPORTE_VOLUME_LACRE] 
                                                                                
The MIT License                                                                 
                                                                                
Copyright: Copyright (C) 2020 T2Ti.COM                                          
                                                                                
Permission is hereby granted, free of charge, to any person                     
obtaining a copy of this software and associated documentation                  
files (the "Software"), to deal in the Software without                         
restriction, including without limitation the rights to use,                    
copy, modify, merge, publish, distribute, sublicense, and/or sell               
copies of the Software, and to permit persons to whom the                       
Software is furnished to do so, subject to the following                        
conditions:                                                                     
                                                                                
The above copyright notice and this permission notice shall be                  
included in all copies or substantial portions of the Software.                 
                                                                                
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,                 
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES                 
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND                        
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT                     
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,                    
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING                    
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR                   
OTHER DEALINGS IN THE SOFTWARE.                                                 
                                                                                
       The author may be contacted at:                                          
           t2ti.com@gmail.com                                                   
                                                                                
@author Albert Eije (alberteije@gmail.com)                    
@version 1.0.0
*******************************************************************************/
declare(strict_types=1);

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="NFE_TRANSPORTE_VOLUME_LACRE")
 */
class NfeTransporteVolumeLacre extends ModelBase implements \JsonSerializable
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", name="NUMERO")
	 */
	private $numero;


    /**
     * Relations
     */
    
    /**
     * @ORM\ManyToOne(targetEntity="NfeTransporteVolume", inversedBy="listaNfeTransporteVolumeLacre")
     * @ORM\JoinColumn(name="ID_NFE_TRANSPORTE_VOLUME", referencedColumnName="id")
     */
    private $nfeTransporteVolume;


    /**
     * Gets e Sets
     */

    public function getId() 
	{
		return $this->id;
	}

	public function setId($id) 
	{
		$this->id = $id;
	}

    public function getNumero() 
	{
		return $this->numero;
	}

	public function setNumero($numero) 
	{
		$this->numero = $numero;
	}

    public function getNfeTransporteVolume(): ?NfeTransporteVolume 
	{
		return $this->nfeTransporteVolume;
	}

	public function setNfeTransporteVolume(?NfeTransporteVolume $nfeTransporteVolume) 
	{
		$this->nfeTransporteVolume = $nfeTransporteVolume;
	}


    /**
     * Constructor
     */
    public function __construct($objetoJson)
    {
        if (isset($objetoJson)) {
            isset($objetoJson->id) ? $this->setId($objetoJson->id) : $this->setId(null);
            $this->mapear($objetoJson);
        }

		
    }

    /**
     * Mapping
     */
    public function mapear($objeto)
    {
        if (isset($objeto)) {
			$this->setNumero($objeto->numero);
		}
    }


    /**
     * Validation
     */
    public function validarObjetoRequisicao($objJson, $id)
    {
        return parent::validarObjeto($objJson, $id, 'NfeTransporteVolumeLacre');
    }


    /**
     * Serialization
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
			'id' => $this->getId(),
			'numero' => $this->getNumero(),
        ];
    }
}
