<?php
namespace OctaPHP\Traits\Mailer;

/**
 * ##########################
 * ###START OF MAILER########
 * ##########################
 *
 * Initialize mail class
 */
use Zend\Mail;

/**
 * Initialize Message class.
 */
use Zend\Mail\Message as OctaMailMessage;

/**
 * Initialize Smtp class.
 * SMTP connection object
 *
 * Loads an instance of Zend\Mail\Protocol\Smtp and forwards smtp transactions
 */
use Zend\Mail\Transport\Smtp as OctaSmtpTransport;

/**
 * Initialize SmtpOptions class.
 */
use Zend\Mail\Transport\SmtpOptions as OctaSmtpOptions;

/**
 * Initialize Sendmail class.
 * Class for sending email via the PHP internal mail() function
 */
use Zend\Mail\Transport\Sendmail as OctaSendmailTransport;

/**
 * Initialize Smtp class.
 * SMTP implementation of Zend\Mail\Protocol\AbstractProtocol
 *
 * Minimum implementation according to RFC2821: EHLO, MAIL FROM, RCPT TO, DATA,
 * RSET, NOOP, QUIT
 */
use Zend\Mail\Protocol\Smtp as OctaSmtpProtocol;

/**
 * Initialize File class.
 * File transport
 *
 * Class for saving outgoing emails in filesystem
 */
use Zend\Mail\Transport\File as OctaFileTransport;

/**
 * Initialize FileOptions class.
 */
use Zend\Mail\Transport\FileOptions as OctaFileOptions;

/**
 * Initialize Message class.
 */
use Zend\Mime\Message as OctaMimeMessage;

/**
 * Initialize Mime class.
 * Support class for MultiPart Mime Messages
 */
use Zend\Mime\Mime as OctaMime;

/**
 * Initialize Part class.
 * Class representing a MIME part.
 */
use Zend\Mime\Part as OctaMimePart;

/**
 * Initialize InMemory class.
 * InMemory transport
 *
 * This transport will just store the message in memory.  It is helpful
 * when unit testing, or to prevent sending email when in development or
 * testing.
 */
use Zend\Mail\Transport\InMemory as OctaInMemoryTransport;

/**
 * Initialize SmtpPluginManager class.
 * Plugin manager implementation for SMTP extensions.
 *
 * Enforces that SMTP extensions retrieved are instances of Smtp. Additionally,
 * it registers a number of default extensions available.
 */
use Zend\Mail\Protocol\SmtpPluginManager as OctaSmtpPluginManager;

/**
 * Initialize Plain class.
 * Performs PLAIN authentication
 */
use Zend\Mail\Protocol\Smtp\Auth\Plain as OctaPlain;

/**
 * Initialize Login class.
 * Performs LOGIN authentication
 */
use Zend\Mail\Protocol\Smtp\Auth\Login as OctaLogin;

/**
 * Initialize Crammd5 class.
 * Performs CRAM-MD5 authentication
 */
use Zend\Mail\Protocol\Smtp\Auth\Crammd5 as OctaCrammd5;

/**
 * Initialize Pop3 class.
 */
use Zend\Mail\Storage\Pop3 as OctaPop3;

/**
 * Initialize Mbox class.
 */
use Zend\Mail\Storage\Mbox as OctaMbox;

/**
 * Initialize Maildir class.
 */
use Zend\Mail\Storage\Maildir as OctaMaildir;

/**
 * Initialize Imap class.
 */
use Zend\Mail\Storage\Imap as OctaImap;

/**
 * Initialize Folder class.
 */
use Zend\Mail\Storage\Folder as OctaMailFolder;

/**
 * Initialize Storage class.
 */
use Zend\Mail\Storage as OctaMailStorage;

trait Mailer{
    /**
     * integrating MIME (email) component of zend.
     *
     * @return OctaMailMessage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function message(){
        return new OctaMailMessage();
    }

    /**
     * integrating mailer/transport method component of zend.
     *
     * @param null $parameters
     * @return OctaSendmailTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function transport($parameters = null){
        return new OctaSendmailTransport($parameters);
    }

    /**
     * integrating mailer/smtp-transport method component of zend.
     *
     * @param array $options
     * @return OctaSmtpTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtpTransport($options = null){
        return new OctaSmtpTransport($options);
    }

    /**
     * integrating mailer/smtp-transport-option method component of zend.
     *
     * @param array $options      smtp options config
     * @return OctaSmtpOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtpOptions(array $options = []){
        return new OctaSmtpOptions($options);
    }

    /**
     * integrating mailer/send-mail-transport method component of zend.
     *
     * @param string $parameters
     * @return OctaSendmailTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function sendMailTransport($parameters = null){
        return new OctaSendmailTransport($parameters);
    }

    /**
     * integrating mailer/smtp protocol method component of zend.
     *
     * @param string $host      local host ip
     * @param string $port      local host port
     * @param array $config    local config data
     * @return OctaSmtpProtocol class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtpProtocol($host = '127.0.0.1', $port = null, array $config = null){
        return new OctaSmtpProtocol($host,$port,$config);
    }

    /**
     * integrating mailer/smtp plugin manager method component of zend.
     *
     * @return OctaSmtpPluginManager class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtpPluginManager(){
        return new OctaSmtpPluginManager();
    }

    /**
     * integrating mailer/file-transport method component of zend.
     *
     * @param $options
     * @return OctaFileTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function fileTransport($options = null){
        return new OctaFileTransport($options);
    }

    /**
     * integrating mailer/file transport option method component of zend.
     *
     * @param array $options
     * @return OctaFileOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function fileOptions(array $options = null){
        return new OctaFileOptions($options);
    }

    /**
     * integrating mailer/inMemory-transport method component of zend.
     *
     * @return OctaInMemoryTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function inMemoryTransport(){
        return new OctaInMemoryTransport();
    }

    /**
     * integrating mailer/mime-message method component of zend.
     *
     * @return OctaMimeMessage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mimeMessage(){
        return new OctaMimeMessage();
    }

    /**
     * integrating mailer/mime method component of zend.
     *
     * @param string $boundary
     * @return OctaMime class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime($boundary = null){
        return new OctaMime($boundary);
    }

    /**
     * integrating mailer/mime-part method component of zend.
     *
     * @param string $content
     * @return OctaMimePart class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mimePart($content = ''){
        return new OctaMimePart($content);
    }

    /**
     * integrating mailer/plain auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return OctaPlain class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function plainAuth($host = '127.0.0.1', $port = null, $config = null){
        return new OctaPlain($host, $port, $config);
    }

    /**
     * integrating mailer/login auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return OctaLogin class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function loginAuth($host = '127.0.0.1', $port = null, $config = null){
        return new OctaLogin($host, $port, $config);
    }

    /**
     * integrating mailer/crammd5 auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return OctaCrammd5 class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function crammd5Auth($host = '127.0.0.1', $port = null, $config = null){
        return new OctaCrammd5($host, $port, $config);
    }

    /**
     * integrating pop3 mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaPop3 class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function pop3(array $params=[]){
        return new OctaPop3($params);
    }

    /**
     * integrating mbox mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaMbox class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox(array $params=[]){
        return new OctaMbox($params);
    }

    /**
     * integrating maildir mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaMaildir class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mailDir(array $params=[]){
        return new OctaMaildir($params);
    }

    /**
     * integrating imap mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaImap class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function imap(array $params=[]){
        return new OctaImap($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @return OctaMailStorage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mailStorage(){
        return new OctaMailStorage();
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        mbox folder
     * @return OctaMailFolder\Mbox class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mboxFolder(array $params = []){
        return new OctaMailFolder\Mbox($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        maildir folder
     * @return OctaMailFolder\Maildir class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mailDirFolder(array $params = []){
        return new OctaMailFolder\Maildir($params);
    }
}