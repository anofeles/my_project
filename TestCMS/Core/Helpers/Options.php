<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 6/21/18
 * Time: 10:44 AM
 */

namespace TestCMS\Core\Helpers;



class Options
{


    public  function add(string $name ,  $value) : void
    {
        if ($this->exists($name))
            throw  new \Exception("Option name must be a unique");
        $this->option()->create([
            'name'=>$name,
            'value'=>$value
        ]);
    }


    public function addOrUpdate(string $name, $value)
    {
        if (!$this->exists($name)){
            $this->add($name,$value);
        }else{
            $this->update($name,$value);
        }
    }


    public function update(string $name,  $value)
    {
        if (!$this->exists($name))
            throw  new \Exception("option with this name doesn't exists");
        $option = $this->option()->where('name',$name)->first();
        $option->update([
            'value'=>$value
        ]);
    }


    public function remove(string $name)
    {
        if (!$this->exists($name))
            throw new \Exception("option with this name doesn't exists");
        $option = $this->option()->where('name',$name)->delete();
    }

    /**
     * @param string $name
     * @return string
     * @author jedy
     */
    public  function get(string $name) : ?string
    {
        $option =  $this->option()
            ->where('name',$name)
            ->first();
        if ($option !== null)
           return $option->toArray()['value'];
        return null;
    }

    /**
     * @param string $name
     * @return bool
     * @author jedy
     */
    public  function exists(string  $name) : bool
    {
        if ($this->option()->where('name',$name)->first())
            return true;
        return false;
    }

    private  function option() : \TestCMS\Models\Options
    {
        return new \TestCMS\Models\Options();
    }


}
