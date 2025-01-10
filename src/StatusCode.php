<?php

declare(strict_types=1);

namespace Locr\Lib\HTTP;

enum StatusCode: int
{
    case Continue = 100;
    case SwitchingProtocols = 101;
    case Processing = 102;
    case EarlyHints = 103;

    case OK = 200;
    case Created = 201;
    case Accepted = 202;
    case NonAuthoritativeInformation = 203;
    case NoContent = 204;
    case ResetContent = 205;
    case PartialContent = 206;
    case MultiStatus = 207;
    case AlreadyReported = 208;
    case IMUsed = 226;

    case MultipleChoices = 300;
    case MovedPermanently = 301;
    case MovedTemporarily = 302;
    case SeeOther = 303;
    case NotModified = 304;
    case UseProxy = 305;
    case Reserved = 306;
    case TemporaryRedirect = 307;
    case PermanentRedirect = 308;

    case BadRequest = 400;
    case Unauthorized = 401;
    case PaymentRequired = 402;
    case Forbidden = 403;
    case NotFound = 404;
    case MethodNotAllowed = 405;
    case NotAcceptable = 406;
    case ProxyAuthenticationRequired = 407;
    case RequestTimeout = 408;
    case Conflict = 409;
    case Gone = 410;
    case LengthRequired = 411;
    case PreconditionFailed = 412;
    case PayloadTooLarge = 413;
    case URITooLong = 414;
    case UnsupportedMediaType = 415;
    case RangeNotSatisfiable = 416;
    case ExpectationFailed = 417;
    case ImATeapot = 418;
    case PolicyNotFulfilled = 420;
    case MisdirectedRequest = 421;
    case UnprocessableEntity = 422;
    case Locked = 423;
    case FailedDependency = 424;
    case TooEarly = 425;
    case UpgradeRequired = 426;
    case PreconditionRequired = 428;
    case TooManyRequests = 429;
    case RequestHeaderFieldsTooLarge = 431;
    case NoResponse = 444;
    case TheRequestShouldBeRetriedAfterDoingTheAppropriateAction = 449;
    case UnavailableForLegalReasons = 451;
    case ClientClosedRequest = 499;

    case InternalServerError = 500;
    case NotImplemented = 501;
    case BadGateway = 502;
    case ServiceUnavailable = 503;
    case GatewayTimeout = 504;
    case HTTPVersionNotSupported = 505;
    case VariantAlsoNegotiates = 506;
    case InsufficientStorage = 507;
    case LoopDetected = 508;
    case BandwidthLimitExceeded = 509;
    case NotExtended = 510;
    case NetworkAuthenticationRequired = 511;

    /**
     * Builds the appropriate header string for the code.
     *
     * ### Example:
     * ```php
     * echo Locr\Lib\HttpStatusCode::OK->buildHeader();
     * ```
     * > HTTP/1.1 200 OK
     */
    public function buildHeader(): string
    {
        return 'HTTP/1.1 ' . $this->value . ' ' . $this->message();
    }

    /**
     * Returns true, if the code is between 400 and 499, otherwise it returns false.
     */
    public function isClientErrorCode(): bool
    {
        return $this->value >= 400 && $this->value < 500;
    }

    /**
     * Returns true, if the code is between 100 and 199, otherwise it returns false.
     */
    public function isInformationalCode(): bool
    {
        return $this->value < 200;
    }

    /**
     * Returns true, if the code is between 300 and 399, otherwise it returns false.
     */
    public function isRedirectionCode(): bool
    {
        return $this->value >= 300 && $this->value < 400;
    }

    /**
     * Returns true, if the code is between 500 and 599, otherwise it returns false.
     */
    public function isServerErrorCode(): bool
    {
        return $this->value >= 500;
    }

    /**
     * Returns true, if the code is between 200 and 299, otherwise it returns false.
     */
    public function isSuccessCode(): bool
    {
        return $this->value >= 200 && $this->value < 300;
    }

    /**
     * Returns the appropriate message to the code.
     *
     * ### Example:
     * ```php
     * echo Locr\Lib\HttpStatusCode::BadRequest->message();
     * ```
     * > Bad Request
     */
    public function message(): string
    {
        return match ($this) {
            self::Continue => 'Continue',
            self::SwitchingProtocols => 'Switching Protocols',
            self::Processing => 'Processing',
            self::EarlyHints => 'Early Hints',

            self::OK => 'OK',
            self::Created => 'Created',
            self::Accepted => 'Accepted',
            self::NonAuthoritativeInformation => 'Non-Authoritative Information',
            self::NoContent => 'No Content',
            self::ResetContent => 'Reset Content',
            self::PartialContent => 'Partial Content',
            self::MultiStatus => 'Multi-Status',
            self::AlreadyReported => 'Already Reported',
            self::IMUsed => 'IM Used',

            self::MultipleChoices => 'Multiple Choices',
            self::MovedPermanently => 'Moved Permanently',
            self::MovedTemporarily => 'Moved Temporarily',
            self::SeeOther => 'See Other',
            self::NotModified => 'Not Modified',
            self::UseProxy => 'Use Proxy',
            self::Reserved => 'Reserved',
            self::TemporaryRedirect => 'Temporary Redirect',
            self::PermanentRedirect => 'Permanent Redirect',

            self::BadRequest => 'Bad Request',
            self::Unauthorized => 'Unauthorized',
            self::PaymentRequired => 'Payment Required',
            self::Forbidden => 'Forbidden',
            self::NotFound => 'Not Found',
            self::MethodNotAllowed => 'Method Not Allowed',
            self::NotAcceptable => 'Not Acceptable',
            self::ProxyAuthenticationRequired => 'Proxy Authentication Required',
            self::RequestTimeout => 'Request Timeout',
            self::Conflict => 'Conflict',
            self::Gone => 'Gone',
            self::LengthRequired => 'Length Required',
            self::PreconditionFailed => 'Precondition Failed',
            self::PayloadTooLarge => 'Payload Too Large',
            self::URITooLong => 'URI Too Long',
            self::UnsupportedMediaType => 'Unsupported Media Type',
            self::RangeNotSatisfiable => 'Range Not Satisfiable',
            self::ExpectationFailed => 'Expectation Failed',
            self::ImATeapot => 'I\'m a teapot',
            self::PolicyNotFulfilled => 'Policy Not Fulfilled',
            self::MisdirectedRequest => 'Misdirected Request',
            self::UnprocessableEntity => 'Unprocessable Entity',
            self::Locked => 'Locked',
            self::FailedDependency => 'Failed Dependency',
            self::TooEarly => 'Too Early',
            self::UpgradeRequired => 'Upgrade Required',
            self::PreconditionRequired => 'Precondition Required',
            self::TooManyRequests => 'Too Many Requests',
            self::RequestHeaderFieldsTooLarge => 'Request Header Fields Too Large',
            self::NoResponse => 'No Response',
            self::TheRequestShouldBeRetriedAfterDoingTheAppropriateAction =>
                'The request should be retried after doing the appropriate action',
            self::UnavailableForLegalReasons => 'Unavailable For Legal Reasons',
            self::ClientClosedRequest => 'Client Closed Request',

            self::InternalServerError => 'Internal Server Error',
            self::NotImplemented => 'Not Implemented',
            self::BadGateway => 'Bad Gateway',
            self::ServiceUnavailable => 'Service Unavailable',
            self::GatewayTimeout => 'Gateway Timeout',
            self::HTTPVersionNotSupported => 'HTTP Version not supported',
            self::VariantAlsoNegotiates => 'Variant Also Negotiates',
            self::InsufficientStorage => 'Insufficient Storage',
            self::LoopDetected => 'Loop Detected',
            self::BandwidthLimitExceeded => 'Bandwidth Limit Exceeded',
            self::NotExtended => 'Not Extended',
            self::NetworkAuthenticationRequired => 'Network Authentication Required'
        };
    }
}
