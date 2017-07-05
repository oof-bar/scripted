<? namespace ScriptEd;

use Stripe;

# Kirby Toolkit
require_once('lib/kirby-toolkit/bootstrap.php');

# Mailchimp & Mandrill APIs
require_once("lib/Mailchimp.php");
require_once("lib/Mandrill.php");

# Stripe
require_once("lib/stripe-php/init.php");
Stripe\Stripe::setApiKey($_SERVER['STRIPE_KEY']);

require_once("lib/Parsedown.php");
require_once('config/info.php');
require_once('config/utilities.php');
require_once('config/helpers.php');
require_once('config/mailer.php');
require_once('config/post-types.php');
require_once('config/narratives.php');
require_once('config/initializers.php');
require_once('config/actions.php');

# Wrappers
require_once('config/wrappers/newsletter.php');
require_once('config/wrappers/gift.php');

add_action('all', '\ScriptEd\Actions::respond', 1);
