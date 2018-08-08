<?php
use Tymon\JWTAuth\Http\Middleware\RefreshToken;
use Dingo\Api\Routing\Router;
/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
        $api->get('users', 'App\\Api\\V1\\Controllers\\UserController@index');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->resource('program_categories', 'App\\Api\\V1\\Controllers\\ProgramCategoryAPIController');
        $api->resource('programs', 'App\\Api\\V1\\Controllers\\ProgramAPIController');
        $api->resource('program_details', 'App\\Api\\V1\\Controllers\\ProgramDetailAPIController');
        $api->resource('project_categories', 'App\\Api\\V1\\Controllers\\ProjectCategoryAPIController');
        $api->resource('projects', 'App\\Api\\V1\\Controllers\\ProjectAPIController');
        $api->resource('project_details', 'App\\Api\\V1\\Controllers\\ProjectDetailAPIController');
        $api->resource('implementers', 'App\\Api\\V1\\Controllers\\ImplementerAPIController');
        $api->resource('beneficiaries', 'App\\Api\\V1\\Controllers\\BeneficiaryAPIController');
        $api->resource('clusters', 'App\\Api\\V1\\Controllers\\ClusterAPIController');
        $api->resource('cluster_members', 'App\\Api\\V1\\Controllers\\ClusterMemberAPIController');
        $api->resource('regions', 'App\\Api\\V1\\Controllers\\RegionAPIController');
        $api->resource('zones', 'App\\Api\\V1\\Controllers\\ZoneAPIController');
        $api->resource('woredas', 'App\\Api\\V1\\Controllers\\WoredaAPIController');
        $api->resource('kebeles', 'App\\Api\\V1\\Controllers\\KebeleAPIController');
        $api->resource('frequencies', 'App\\Api\\V1\\Controllers\\FrequencyAPIController');
        $api->resource('project_beneficiaries', 'App\\Api\\V1\\Controllers\\ProjectBeneficiaryAPIController');
        $api->resource('project_implementers', 'App\\Api\\V1\\Controllers\\ProjectImplementerAPIController');
        $api->resource('project_frequencies', 'App\\Api\\V1\\Controllers\\ProjectFrequencyAPIController');
        $api->resource('statuses', 'App\\Api\\V1\\Controllers\\StatusAPIController');
        $api->resource('outcomes', 'App\\Api\\V1\\Controllers\\OutcomeAPIController');
        $api->resource('outputs', 'App\\Api\\V1\\Controllers\\OutputAPIController');
        $api->resource('indicators', 'App\\Api\\V1\\Controllers\\IndicatorAPIController');
        $api->resource('outcome_indicators', 'App\\Api\\V1\\Controllers\\OutcomeIndicatorAPIController');
        $api->resource('output_indicators', 'App\\Api\\V1\\Controllers\\OutputIndicatorAPIController');
        $api->get('outcome_outputs/{id}', 'App\\Api\\V1\\Controllers\\OutputAPIController@getOutputsByOutcome');
        $api->get('refresh', function(){
            $token = auth()->guard()->refresh();
            return response()->json([
                'status' => 'ok',
                'token' => $token,
                'expires_in' => auth()->guard()->factory()->getTTL() * 60
            ]);
        });
    });

});