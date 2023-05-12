<?php
declare(strict_types=1);

namespace Manuylenko\CurlWrapper;

use CurlHandle;

class Curl
{
    /**
     * Дескриптор cUrl.
     *
     * @var CurlHandle
     */
    protected CurlHandle $cUrl;


    /**
     * Конструктор.
     *
     * @param ?string $url
     * @param array $options
     *
     * @throws CurlException
     */
    public function __construct(?string $url = null, array $options = [])
    {
        $cUrl = $this->init($url);

        if ($cUrl === false) {
            throw new CurlException('Не удалось инициализировать cUrl');
        }

        $this->cUrl = $cUrl;

        if (! empty($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Деструктор.
     */
    public function __destruct()
    {
        curl_close($this->cUrl);
    }

    # # # #

    /**
     * Завершает сеанс.
     *
     * [^ PHP 8.0] Использование метода больше не имеет смысла.
     *
     * @link https://www.php.net/manual/ru/function.curl-close.php
     *
     * @return void
     */
    public function close(): void
    {
        curl_close($this->cUrl);
    }

    /**
     * Копирует дескриптор вместе со всеми его настройками.
     *
     * @link https://www.php.net/manual/ru/function.curl-copy-handle.php
     *
     * @return CurlHandle|bool
     */
    public function copy(): CurlHandle|bool
    {
        return curl_copy_handle($this->cUrl);
    }

    /**
     * Возвращает номер ошибки или 0 (ноль), если ошибки не произошло.
     *
     * @link https://www.php.net/manual/ru/function.curl-errno.php
     *
     * @return int
     */
    public function errno() : int
    {
        return curl_errno($this->cUrl);
    }

    /**
     * Возвращает сообщение об ошибке или "" (пустую строку), если ошибки не произошло.
     *
     * @link https://www.php.net/manual/ru/function.curl-error.php
     *
     * @return string
     */
    public function error() : string
    {
        return curl_error($this->cUrl);
    }

    /**
     * Кодирует строку согласно {@link http://www.faqs.org/rfcs/rfc3986.html RFC 3986}.
     *
     * @link https://www.php.net/manual/ru/function.curl-escape.php
     *
     * @param string $string
     *
     * @return string|bool
     */
    public function escape(string $string) : string|bool
    {
        return curl_escape($this->cUrl, $string);
    }

    /**
     * Выполняет запрос.
     *
     * @link https://www.php.net/manual/ru/function.curl-exec.php
     *
     * @return string|bool
     */
    public function exec(): string|bool
    {
        return curl_exec($this->cUrl);
    }

    /**
     * Возвращает информацию об определённой операции.
     *
     * @link https://www.php.net/manual/ru/function.curl-getinfo.php
     *
     * @param int|null $option
     *
     * @return mixed
     */
    public function getinfo(?int $option = null): mixed
    {
        return curl_getinfo($this->cUrl, $option);
    }

    /**
     * Инициализирует сеанс.
     *
     * @link https://www.php.net/manual/ru/function.curl-init.php
     *
     * @param string|null $url
     *
     * @return CurlHandle|bool
     */
    public function init(?string $url = null): CurlHandle|bool
    {
        return curl_init($url);
    }

    /**
     * Приостановливает и возобновляет соединение.
     *
     * @link https://www.php.net/manual/ru/function.curl-pause.php
     *
     * @param int $flags
     *
     * @return int
     */
    public function pause(int $flags): int
    {
        return curl_pause($this->cUrl, $flags);
    }

    /**
     * Сбросывает все настройки обработчика сессии libcurl.
     *
     * @link https://www.php.net/manual/ru/function.curl-reset.php
     *
     * @return void
     */
    public function reset(): void
    {
        curl_reset($this->cUrl);
    }

    /**
     * Устанавливает несколько параметров для сеанса.
     *
     * @link https://www.php.net/manual/ru/function.curl-setopt-array.php
     *
     * @param array $options
     *
     * @return bool
     */
    public function setOptions(array $options): bool
    {
        return curl_setopt_array($this->cUrl, $options);
    }

    /**
     * Устанавливает параметр для сеанса.
     *
     * @link https://www.php.net/manual/ru/function.curl-setopt.php
     *
     * @param int $option
     * @param mixed $value
     *
     * @return bool
     */
    public function setOption(int $option, mixed $value): bool
    {
        return curl_setopt($this->cUrl, $option, $value);
    }

    /**
     * Получает текстовое описание для кода ошибки.
     *
     * @link https://www.php.net/manual/ru/function.curl-strerror.php
     *
     * @param int $errorCode
     *
     * @return ?string
     */
    public function strerror(int $errorCode): ?string
    {
        return curl_strerror($errorCode);
    }

    /**
     * Декодирует закодированную URL-строку.
     *
     * @link https://www.php.net/manual/ru/function.curl-unescape.php
     *
     * @param string $string
     *
     * @return string|bool
     */
    public function unescape(string $string): string|bool
    {
        return curl_unescape($this->cUrl, $string);
    }

    /**
     * Возвращает версию cUrl.
     *
     * @link https://www.php.net/manual/ru/function.curl-version.php
     *
     * @return array|bool
     */
    public function version(): array|bool
    {
        return curl_version();
    }
}
