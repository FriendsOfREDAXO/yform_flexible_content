<?php

class rex_api_fc_sql extends rex_api_function
{
    /**
     * @throws JsonException
     * @return rex_api_result|void
     */
    public function execute()
    {
        $queryString = rex_get('query', 'string', '');

        if ('SELECT' === rex_sql::getQueryType($queryString)) {
            $sql = rex_sql::factory();

            try {
                $data = $sql->getArray($queryString);
                rex_response::sendJson($data);
                exit;
            } catch (rex_sql_exception $e) {
                rex_response::cleanOutputBuffers();
                rex_response::sendContentType('application/json');
                rex_response::setStatus(rex_response::HTTP_BAD_REQUEST);
                rex_response::sendContent(json_encode([
                    'message' => $e->getMessage(),
                    'status' => rex_response::HTTP_BAD_REQUEST,
                ], JSON_THROW_ON_ERROR));
                exit;
            }
        }

        rex_response::cleanOutputBuffers();
        rex_response::sendContentType('application/json');
        rex_response::setStatus(rex_response::HTTP_BAD_REQUEST);
        rex_response::sendContent(json_encode([
            'message' => 'Query is not a SELECT statement.',
            'status' => rex_response::HTTP_BAD_REQUEST,
        ], JSON_THROW_ON_ERROR));
        exit;
    }
}
