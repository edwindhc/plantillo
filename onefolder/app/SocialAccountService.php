<?php

namespace App;

use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
	public function createOrGetUser(Provider $provider)
	{
		$providerUser = $provider->user();
		$providerName = class_basename($provider);

		$account = SocialAccount::whereProvider($providerName)
			->whereProviderUserId($providerUser->getId())
			->first();

		if ($account) {
			return $account->user;
		} else {

			$account = new SocialAccount([
				'provider_user_id' => $providerUser->getId(),
				'provider' => $providerName
			]);

			$user = User::whereEmail($providerUser->getEmail())->first();

			if (!$user) {
				$time = time();
				$user = User::create([
					'username' => $time,
					'email' => $providerUser->getEmail(),
					'name' => $providerUser->getName(),
					'avatar' => $providerUser->getAvatar(),
					'role_id'   => 3,
					'themes'    => 4
				]);
			}

			$account->user()->associate($user);
			$account->save();

			return $user;

		}

	}
}
