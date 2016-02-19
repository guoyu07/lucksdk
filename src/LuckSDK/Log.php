<?php
/**
 * Log.php.
 *
 * Part of Tianyong90\LuckSDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    tianyong90 <412039588@qq.com>
 * @copyright 2016 tianyong90 <412039588@qq.com>
 *
 * @link      https://github.com/tianyong90
 */
namespace Tianyong90\LuckSDK;

/**
 * 日志.
 */
class Log
{
    /**
     * 日志文件路径.
     *
     * @var string
     */
    private static $logPath;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->logPath = get_sys_temp_path();
    }

    public static function info($logData)
    {
        self::writeLog('fuckit');

        // $this->writeLog('fuckit');
    }

    public static function debug()
    {
    }

    private static function writeLog($content, $level = 'info')
    {
        $data = sprintf('%s [%s]: %s', date('Y-m-d H:i:s'), strtoupper($level), $content);

        echo $data;

        // $log = fopen($this->filePath, 'aw');
        // fwrite($log, $content);
        // fclose($log);
    }
}
