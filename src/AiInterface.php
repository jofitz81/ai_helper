<?php

declare(strict_types=1);

namespace Drupal\ai_helper;

interface AiInterface {
  /**
   * Return response from an AI request.
   *
   * @param array $message_texts
   *   The messages.
   * @param array $tags
   *   Extra tags to set.
   *
   * @return string
   *   The response.
   */
  public function makeAiRequest(array $message_texts, array $tags = []): string;

  /**
   * Get the operation type of the AI interaction.
   *
   * @return string
   *   The operation type.
   */
  function getOperationType(): string;

}
