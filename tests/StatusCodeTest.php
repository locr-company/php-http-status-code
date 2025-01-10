<?php

declare(strict_types=1);

namespace UnitTests;

use Locr\Lib\HTTP\StatusCode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StatusCode::class)]
final class StatusCodeTest extends TestCase
{
    public function testCodes(): void
    {
        $this->assertEquals(100, StatusCode::Continue->value);
        $this->assertEquals(101, StatusCode::SwitchingProtocols->value);
        $this->assertEquals(102, StatusCode::Processing->value);
        $this->assertEquals(103, StatusCode::EarlyHints->value);

        $this->assertEquals(200, StatusCode::OK->value);
        $this->assertEquals(201, StatusCode::Created->value);
        $this->assertEquals(202, StatusCode::Accepted->value);
        $this->assertEquals(203, StatusCode::NonAuthoritativeInformation->value);
        $this->assertEquals(204, StatusCode::NoContent->value);
        $this->assertEquals(205, StatusCode::ResetContent->value);
        $this->assertEquals(206, StatusCode::PartialContent->value);
        $this->assertEquals(207, StatusCode::MultiStatus->value);
        $this->assertEquals(208, StatusCode::AlreadyReported->value);
        $this->assertEquals(226, StatusCode::IMUsed->value);

        $this->assertEquals(300, StatusCode::MultipleChoices->value);
        $this->assertEquals(301, StatusCode::MovedPermanently->value);
        $this->assertEquals(302, StatusCode::MovedTemporarily->value);
        $this->assertEquals(303, StatusCode::SeeOther->value);
        $this->assertEquals(304, StatusCode::NotModified->value);
        $this->assertEquals(305, StatusCode::UseProxy->value);
        $this->assertEquals(306, StatusCode::Reserved->value);
        $this->assertEquals(307, StatusCode::TemporaryRedirect->value);
        $this->assertEquals(308, StatusCode::PermanentRedirect->value);

        $this->assertEquals(400, StatusCode::BadRequest->value);
        $this->assertEquals(401, StatusCode::Unauthorized->value);
        $this->assertEquals(402, StatusCode::PaymentRequired->value);
        $this->assertEquals(403, StatusCode::Forbidden->value);
        $this->assertEquals(404, StatusCode::NotFound->value);
        $this->assertEquals(405, StatusCode::MethodNotAllowed->value);
        $this->assertEquals(406, StatusCode::NotAcceptable->value);
        $this->assertEquals(407, StatusCode::ProxyAuthenticationRequired->value);
        $this->assertEquals(408, StatusCode::RequestTimeout->value);
        $this->assertEquals(409, StatusCode::Conflict->value);
        $this->assertEquals(410, StatusCode::Gone->value);
        $this->assertEquals(411, StatusCode::LengthRequired->value);
        $this->assertEquals(412, StatusCode::PreconditionFailed->value);
        $this->assertEquals(413, StatusCode::PayloadTooLarge->value);
        $this->assertEquals(414, StatusCode::URITooLong->value);
        $this->assertEquals(415, StatusCode::UnsupportedMediaType->value);
        $this->assertEquals(416, StatusCode::RangeNotSatisfiable->value);
        $this->assertEquals(417, StatusCode::ExpectationFailed->value);
        $this->assertEquals(418, StatusCode::ImATeapot->value);
        $this->assertEquals(420, StatusCode::PolicyNotFulfilled->value);
        $this->assertEquals(421, StatusCode::MisdirectedRequest->value);
        $this->assertEquals(422, StatusCode::UnprocessableEntity->value);
        $this->assertEquals(423, StatusCode::Locked->value);
        $this->assertEquals(424, StatusCode::FailedDependency->value);
        $this->assertEquals(425, StatusCode::TooEarly->value);
        $this->assertEquals(426, StatusCode::UpgradeRequired->value);
        $this->assertEquals(428, StatusCode::PreconditionRequired->value);
        $this->assertEquals(429, StatusCode::TooManyRequests->value);
        $this->assertEquals(431, StatusCode::RequestHeaderFieldsTooLarge->value);
        $this->assertEquals(444, StatusCode::NoResponse->value);
        $this->assertEquals(449, StatusCode::TheRequestShouldBeRetriedAfterDoingTheAppropriateAction->value);
        $this->assertEquals(451, StatusCode::UnavailableForLegalReasons->value);
        $this->assertEquals(499, StatusCode::ClientClosedRequest->value);

        $this->assertEquals(500, StatusCode::InternalServerError->value);
        $this->assertEquals(501, StatusCode::NotImplemented->value);
        $this->assertEquals(502, StatusCode::BadGateway->value);
        $this->assertEquals(503, StatusCode::ServiceUnavailable->value);
        $this->assertEquals(504, StatusCode::GatewayTimeout->value);
        $this->assertEquals(505, StatusCode::HTTPVersionNotSupported->value);
        $this->assertEquals(506, StatusCode::VariantAlsoNegotiates->value);
        $this->assertEquals(507, StatusCode::InsufficientStorage->value);
        $this->assertEquals(508, StatusCode::LoopDetected->value);
        $this->assertEquals(509, StatusCode::BandwidthLimitExceeded->value);
        $this->assertEquals(510, StatusCode::NotExtended->value);
        $this->assertEquals(511, StatusCode::NetworkAuthenticationRequired->value);
    }

    public function testBuildHeader(): void
    {
        $this->assertEquals('HTTP/1.1 100 Continue', StatusCode::Continue->buildHeader());
        $this->assertEquals('HTTP/1.1 200 OK', StatusCode::OK->buildHeader());
        $this->assertEquals('HTTP/1.1 404 Not Found', StatusCode::NotFound->buildHeader());
    }

    public function testIsInformationalCode(): void
    {
        $this->assertTrue(StatusCode::Continue->isInformationalCode());
        $this->assertFalse(StatusCode::Continue->isSuccessCode());
        $this->assertFalse(StatusCode::Continue->isRedirectionCode());
        $this->assertFalse(StatusCode::Continue->isClientErrorCode());
        $this->assertFalse(StatusCode::Continue->isServerErrorCode());
    }

    public function testIsSuccessCode(): void
    {
        $this->assertFalse(StatusCode::OK->isInformationalCode());
        $this->assertTrue(StatusCode::OK->isSuccessCode());
        $this->assertFalse(StatusCode::OK->isRedirectionCode());
        $this->assertFalse(StatusCode::OK->isClientErrorCode());
        $this->assertFalse(StatusCode::OK->isServerErrorCode());
    }

    public function testIsRedirectionCode(): void
    {
        $this->assertFalse(StatusCode::MovedPermanently->isInformationalCode());
        $this->assertFalse(StatusCode::MovedPermanently->isSuccessCode());
        $this->assertTrue(StatusCode::MovedPermanently->isRedirectionCode());
        $this->assertFalse(StatusCode::MovedPermanently->isClientErrorCode());
        $this->assertFalse(StatusCode::MovedPermanently->isServerErrorCode());
    }

    public function testIsClientErrorCode(): void
    {
        $this->assertFalse(StatusCode::BadRequest->isInformationalCode());
        $this->assertFalse(StatusCode::BadRequest->isSuccessCode());
        $this->assertFalse(StatusCode::BadRequest->isRedirectionCode());
        $this->assertTrue(StatusCode::BadRequest->isClientErrorCode());
        $this->assertFalse(StatusCode::BadRequest->isServerErrorCode());
    }

    public function testIsServerErrorCode(): void
    {
        $this->assertFalse(StatusCode::InternalServerError->isInformationalCode());
        $this->assertFalse(StatusCode::InternalServerError->isSuccessCode());
        $this->assertFalse(StatusCode::InternalServerError->isRedirectionCode());
        $this->assertFalse(StatusCode::InternalServerError->isClientErrorCode());
        $this->assertTrue(StatusCode::InternalServerError->isServerErrorCode());
    }

    public function testMessage(): void
    {
        $this->assertEquals('Continue', StatusCode::Continue->message());
        $this->assertEquals('Switching Protocols', StatusCode::SwitchingProtocols->message());
        $this->assertEquals('Processing', StatusCode::Processing->message());
        $this->assertEquals('Early Hints', StatusCode::EarlyHints->message());

        $this->assertEquals('OK', StatusCode::OK->message());
        $this->assertEquals('Created', StatusCode::Created->message());
        $this->assertEquals('Accepted', StatusCode::Accepted->message());
        $this->assertEquals('Non-Authoritative Information', StatusCode::NonAuthoritativeInformation->message());
        $this->assertEquals('No Content', StatusCode::NoContent->message());
        $this->assertEquals('Reset Content', StatusCode::ResetContent->message());
        $this->assertEquals('Partial Content', StatusCode::PartialContent->message());
        $this->assertEquals('Multi-Status', StatusCode::MultiStatus->message());
        $this->assertEquals('Already Reported', StatusCode::AlreadyReported->message());
        $this->assertEquals('IM Used', StatusCode::IMUsed->message());

        $this->assertEquals('Multiple Choices', StatusCode::MultipleChoices->message());
        $this->assertEquals('Moved Permanently', StatusCode::MovedPermanently->message());
        $this->assertEquals('Moved Temporarily', StatusCode::MovedTemporarily->message());
        $this->assertEquals('See Other', StatusCode::SeeOther->message());
        $this->assertEquals('Not Modified', StatusCode::NotModified->message());
        $this->assertEquals('Use Proxy', StatusCode::UseProxy->message());
        $this->assertEquals('Reserved', StatusCode::Reserved->message());
        $this->assertEquals('Temporary Redirect', StatusCode::TemporaryRedirect->message());
        $this->assertEquals('Permanent Redirect', StatusCode::PermanentRedirect->message());

        $this->assertEquals('Bad Request', StatusCode::BadRequest->message());
        $this->assertEquals('Unauthorized', StatusCode::Unauthorized->message());
        $this->assertEquals('Payment Required', StatusCode::PaymentRequired->message());
        $this->assertEquals('Forbidden', StatusCode::Forbidden->message());
        $this->assertEquals('Not Found', StatusCode::NotFound->message());
        $this->assertEquals('Method Not Allowed', StatusCode::MethodNotAllowed->message());
        $this->assertEquals('Not Acceptable', StatusCode::NotAcceptable->message());
        $this->assertEquals('Proxy Authentication Required', StatusCode::ProxyAuthenticationRequired->message());
        $this->assertEquals('Request Timeout', StatusCode::RequestTimeout->message());
        $this->assertEquals('Conflict', StatusCode::Conflict->message());
        $this->assertEquals('Gone', StatusCode::Gone->message());
        $this->assertEquals('Length Required', StatusCode::LengthRequired->message());
        $this->assertEquals('Precondition Failed', StatusCode::PreconditionFailed->message());
        $this->assertEquals('Payload Too Large', StatusCode::PayloadTooLarge->message());
        $this->assertEquals('URI Too Long', StatusCode::URITooLong->message());
        $this->assertEquals('Unsupported Media Type', StatusCode::UnsupportedMediaType->message());
        $this->assertEquals('Range Not Satisfiable', StatusCode::RangeNotSatisfiable->message());
        $this->assertEquals('Expectation Failed', StatusCode::ExpectationFailed->message());
        $this->assertEquals('I\'m a teapot', StatusCode::ImATeapot->message());
        $this->assertEquals('Policy Not Fulfilled', StatusCode::PolicyNotFulfilled->message());
        $this->assertEquals('Misdirected Request', StatusCode::MisdirectedRequest->message());
        $this->assertEquals('Unprocessable Entity', StatusCode::UnprocessableEntity->message());
        $this->assertEquals('Locked', StatusCode::Locked->message());
        $this->assertEquals('Failed Dependency', StatusCode::FailedDependency->message());
        $this->assertEquals('Too Early', StatusCode::TooEarly->message());
        $this->assertEquals('Upgrade Required', StatusCode::UpgradeRequired->message());
        $this->assertEquals('Precondition Required', StatusCode::PreconditionRequired->message());
        $this->assertEquals('Too Many Requests', StatusCode::TooManyRequests->message());
        $this->assertEquals('Request Header Fields Too Large', StatusCode::RequestHeaderFieldsTooLarge->message());
        $this->assertEquals('No Response', StatusCode::NoResponse->message());
        $this->assertEquals(
            'The request should be retried after doing the appropriate action',
            StatusCode::TheRequestShouldBeRetriedAfterDoingTheAppropriateAction->message()
        );
        $this->assertEquals('Unavailable For Legal Reasons', StatusCode::UnavailableForLegalReasons->message());
        $this->assertEquals('Client Closed Request', StatusCode::ClientClosedRequest->message());

        $this->assertEquals('Internal Server Error', StatusCode::InternalServerError->message());
        $this->assertEquals('Not Implemented', StatusCode::NotImplemented->message());
        $this->assertEquals('Bad Gateway', StatusCode::BadGateway->message());
        $this->assertEquals('Service Unavailable', StatusCode::ServiceUnavailable->message());
        $this->assertEquals('Gateway Timeout', StatusCode::GatewayTimeout->message());
        $this->assertEquals('HTTP Version not supported', StatusCode::HTTPVersionNotSupported->message());
        $this->assertEquals('Variant Also Negotiates', StatusCode::VariantAlsoNegotiates->message());
        $this->assertEquals('Insufficient Storage', StatusCode::InsufficientStorage->message());
        $this->assertEquals('Loop Detected', StatusCode::LoopDetected->message());
        $this->assertEquals('Bandwidth Limit Exceeded', StatusCode::BandwidthLimitExceeded->message());
        $this->assertEquals('Not Extended', StatusCode::NotExtended->message());
        $this->assertEquals(
            'Network Authentication Required',
            StatusCode::NetworkAuthenticationRequired->message()
        );
    }
}
