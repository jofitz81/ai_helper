<?php

declare(strict_types=1);

namespace Drupal\ai_helper;

use Drupal\ai\OperationType\TextToImage\TextToImageInput;

/**
 * The AI Text To Image helper service.
 */
class TextToImage extends AiBase {

  /**
   * @inheritDoc
   */
  public function makeAiRequest(array|string $message_texts, array $tags = []): array {
    $input = new TextToImageInput($message_texts);
    /** @var \Drupal\ai\OperationType\TextToImage\TextToImageInterface $provider */
    $provider = $this->getProvider();
    $output = $provider->textToImage($input, $this->getModel(), $tags);
    return $output->getNormalized();
  }

  /**
   * @inheritDoc
   */
  function getOperationType(): string {
    return 'text_to_image';
  }

}
