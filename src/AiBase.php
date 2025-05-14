<?php

declare(strict_types=1);

namespace Drupal\ai_helper;

use Drupal\ai\AiProviderPluginManager;
use Drupal\ai\Exception\AiSetupFailureException;
use Drupal\ai\Plugin\ProviderProxy;

/**
 * The AI Chat helper service.
 */
abstract class AiBase implements AiInterface {

  /**
   * The AI provider.
   *
   * @var \Drupal\ai\Plugin\ProviderProxy
   */
  protected ProviderProxy $provider;

  /**
   * The names of the model.
   *
   * @var string
   */
  protected string $model;

  /**
   * Constructs a Chat object.
   */
  public function __construct(
    private readonly AiProviderPluginManager $aiProvider,
  ) {}

  /**
   * Set the AI Provider and Model.
   */
  protected function setProviderAndModel(): void {
    $default = $this->aiProvider->getDefaultProviderForOperationType($this->getOperationType());
    if (empty($default['provider_id'])) {
      throw new AiSetupFailureException('No provider set, please check the AI Default Settings');
    }
    $this->provider = $this->aiProvider->createInstance($default['provider_id']);
    $this->model = $default['model_id'];
  }

  /**
   * Get the AI provider.
   *
   * @return \Drupal\ai\Plugin\ProviderProxy
   *   The AI provider.
   */
  protected function getProvider(): ProviderProxy {
    if (!isset($this->provider)) {
      $this->setProviderAndModel();
    }
    return $this->provider;
  }

  /**
   * Get the AI model.
   *
   * @return string
   *   The AI model.
   */
  protected function getModel(): string {
    if (!isset($this->model)) {
      $this->setProviderAndModel();
    }
    return $this->model;
  }

}
