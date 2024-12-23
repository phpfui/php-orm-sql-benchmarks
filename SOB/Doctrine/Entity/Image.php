<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int image_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int imageable_id;

	/**
	 * @ORM\Column(type=string, length=128, nullable=true)
	 */
	public ?string imageable_type;

	/**
	 * @ORM\Column(type=string, length=128)
	 */
	public string path;


	}
