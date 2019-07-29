<?php
/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 29.07.2019
 * Time: 17:59
 */

namespace App\System\Config;

use Symfony\Component\Config\FileLocator;

class Config implements ConfigInterface
{

    private $config = [];
    /**
     * @var YamlConfigLoader
     */
    private $loader;
    /**
     * @var FileLocator
     */
    private $locator;

    public function __construct($dir)
    {
        $directories = [
            BASEPATH.'/'.$dir,
        ];

        $this->setLocator($directories);
        $this->setLoader();
    }

    public function addConfig($file)
    {
        $configValues = $this->loader->load($this->locator->locate($file));
        if($configValues){
            foreach ($configValues as $key => $value) {
                $this->config[$key] = $value;
            }
        }
    }
    public function get($keyValue)
    {
        list($key, $value) = explode('.', $keyValue);
        if($key && isset($this->config[$key])){
            if($value && isset($this->config[$key][$value])){
                return $this->config[$key][$value];
            } else {
                return $this->config[$key];
            }
        }
        return null;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setLoader()
    {
        $this->loader = new YamlConfigLoader($this->locator);
    }

    public function setLocator($dir)
    {
        $this->locator = new FileLocator($dir);
    }


}
