<?php
/**
 * Policy class to determine if the user can login
 *
 * @package    Vendo
 * @author     Jeremy Bush
 * @copyright  (c) 2010 Jeremy Bush
 * @license    http://github.com/zombor/Vendo/raw/master/LICENSE
 */
class Vendo_Policy_Login extends Policy
{
	const LOGGED_IN = 1;

	/**
	 * Method to execute the policy
	 * 
	 * @param Model_Vendo_User $user  the user account to run the policy on
	 * @param array            $extra an array of extra parameters that this policy
	 *                                can use
	 *
	 * @return bool/int
	 */
	public function execute(Model_Vendo_User $user, array $array = NULL)
	{
		if (
			$user->id == Auth::instance()->get_user()->id
			AND ! Auth::instance()->logged_in()
		)
		{
			return TRUE;
		}
		elseif (Auth::instance()->logged_in())
		{
			return self::LOGGED_IN;
		}

		return FALSE;
	}
}