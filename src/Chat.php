<?php

declare(strict_types=1);

namespace Drupal\ai_helper;

use Drupal\ai\OperationType\Chat\ChatInput;
use Drupal\ai\OperationType\Chat\ChatMessage;

/**
 * The AI Chat helper service.
 */
class Chat extends AiBase {

  /**
   * @inheritDoc
   */
  public function makeAiRequest(array|string $message_texts, array $tags = []): string {
    $messages = [];
    foreach ($message_texts as $message_text) {
      $messages[] = new ChatMessage('user', $message_text);
    }
    $input = new ChatInput($messages);
    /** @var \Drupal\ai\OperationType\Chat\ChatInterface $provider */
    $provider = $this->getProvider();
    $output = $provider->chat($input, $this->getModel(), $tags);
    return trim($output->getNormalized()->getText());
  }

  /**
   * @inheritDoc
   */
  function getOperationType(): string {
    return 'chat';
  }

}
