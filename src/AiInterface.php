<?php

declare(strict_types=1);

namespace Drupal\ai_helper;

interface AiInterface {

  /**
   * Return response from an AI request.
   *
   * @param array|string $message_texts
   *   The messages.
   * @param array $tags
   *   Extra tags to set.
   *
   * @return mixed
   *   The response.
   */
  public function makeAiRequest(array|string $message_texts, array $tags = []): mixed;

  /**
   * Get the operation type of the AI interaction.
   *
   * @return string
   *   The operation type.
   */
  function getOperationType(): string;

}
