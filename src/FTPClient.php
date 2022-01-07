<?php


namespace BABA\FTP;

use \Exception;

class FTPClient
{
    private $hostname = "";
    private $username = "";
    private $password = "";
    private $rootfolder = "";


    /** @var \FtpClient\FtpClient  */
    private $ftp;

    /**
     * FtpClient constructor.
     * @param string $hostname
     * @param string $username
     * @param string $password
     * @param string $rootFolder
     * @throws \Lazzard\FtpClient\Exception\ConnectionException
     */
    public function __construct(string $hostname, string $username, string $password, string $rootFolder)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->rootfolder = $rootFolder;
        $this->ftp = new \FtpClient\FtpClient();
    }

    /**
     * @throws Exception
     */
    public function login()
    {
        if (!$this->ftp->connect($this->hostname)) {
            throw new Exception("FTP: Connection problem");
        }
        if (!$this->ftp->login($this->username,$this->password)) {
            throw new Exception("FTP: Incorect login");
        }
    }

    /**
     * @param $dir
     * @throws \Lazzard\FtpClient\Exception\FtpClientException
     */
    public function mkdir($dir) {
        echo "Creating $dir...";
        $this->ftp->mkdir($dir);
        echo "DONE\n";
    }

    /**
     * @param $dir
     * @throws \Lazzard\FtpClient\Exception\FtpClientException
     */
    public function chdir($dir)
    {
        $this->ftp->chdir($dir);
    }

    /**
     * @param $src
     * @param $dst
     * @throws Exception
     */
    public function uploadFile($src, $dst)
    {
        echo ".";
        if (!$this->ftp->put($dst, $src)) {
            throw new Exception("FTP: Error upload file");
        }
    }

    /**
     * @param $src
     * @param $dst
     * @throws Exception
     */
    public function downloadFile($src, $dst)
    {
        if (!$this->ftp->get($dst, $src)) {
            throw new Exception("FTP: Error download file");
        }
    }

    /**
     * @param $dir
     * @return array
     * @throws \Lazzard\FtpClient\Exception\FtpClientException
     */
    public function listFiles($dir) {
        return $this->ftp->nlist($dir);
    }

    public function downloadFolder($src, $dst) {

    }

    public function uploadFolder($src, $dst) {

    }

    /**
     * Disconnect
     */
    public function disconnect() {
        $this->ftp->close();
    }

}