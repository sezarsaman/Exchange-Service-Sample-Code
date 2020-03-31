<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    public function an_order_can_be_shown_via_api()
    {
        $this->withExceptionHandling();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjliNTYwYzM0MjFiZmQ0MTE5NTg2MzhhMWY2YmRjN2QwOGNmYmI4NTgxZTQ3NDhlMDY4OTVjMThhODE5ZjZhYTRlOThhNzkyZWI0ZWI5Y2MiLCJpYXQiOjE1ODUxNDE4NTYsIm5iZiI6MTU4NTE0MTg1NiwiZXhwIjoxNjE2Njc3ODU2LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.O0pw7qaqBxJaQZeXj2YBCgcsoZR_24if9SEzHXpReQthr_hvoyRD_3rds_HIZI6FT9U5k3QLJ9nicuHGD5vBqIwLWutOAwSWBntUkJsiHnyLAMBmeu3rI4LcdirfTt3Z_zjGKJt3rKMuO1R6Z1C9oaIAyQZP9oGALu8Xrv4mB1wpQnaiZ0eVVJAtEqi94n0JeTY-X5x87z4N5_rw7UOyHUO5FbQiUJvB07vlQzxZggq3BZDjbK9FbX9WOV0iMSGZxIAxcR5gaKZjMz86RXWT0CFwNTg-gxOzv_jRzbpKUvygzIfJisc-JIE16SoAh9_3m9kontwrvCj_aCYnmN5PP49QdiBAI_lzex583BOGpL827mAxF9k1Lwn-IV-lod4D3cHP6msOHs04ENROzOw8YCuJeTE4n5feTC8Fc2vRW0__-Vi7PqE5F6OcXi3zQ744dh_DOn_O9cXi0tsxaoxjn7Qh3QYhppStlM3jjb1D4Wh9BuNb6557fESoBEPVVKVH-BMI1FQxzt0854WlHjK0GN2NIlOa0TiR5ulmGYMXEepvBFIWNCYUCavmzB6RyjLbXfCIXhucch35XOjf5xUPpqPWtXuO6OQeSo23ckxfFLWgFvSvRzpGBS0hCD3s-5eCMV8z4dtNqeDLAv09Lrui66bgUAqtFRArWFEYkDaoLhI',
        ])->json('POST', '/api/orders/show', [
            'code' => '5764188',
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'order' => array()
            ]);
    }

    /**
     * @test
     */
    public function an_order_can_be_added_via_api()
    {
        $this->withExceptionHandling();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjliNTYwYzM0MjFiZmQ0MTE5NTg2MzhhMWY2YmRjN2QwOGNmYmI4NTgxZTQ3NDhlMDY4OTVjMThhODE5ZjZhYTRlOThhNzkyZWI0ZWI5Y2MiLCJpYXQiOjE1ODUxNDE4NTYsIm5iZiI6MTU4NTE0MTg1NiwiZXhwIjoxNjE2Njc3ODU2LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.O0pw7qaqBxJaQZeXj2YBCgcsoZR_24if9SEzHXpReQthr_hvoyRD_3rds_HIZI6FT9U5k3QLJ9nicuHGD5vBqIwLWutOAwSWBntUkJsiHnyLAMBmeu3rI4LcdirfTt3Z_zjGKJt3rKMuO1R6Z1C9oaIAyQZP9oGALu8Xrv4mB1wpQnaiZ0eVVJAtEqi94n0JeTY-X5x87z4N5_rw7UOyHUO5FbQiUJvB07vlQzxZggq3BZDjbK9FbX9WOV0iMSGZxIAxcR5gaKZjMz86RXWT0CFwNTg-gxOzv_jRzbpKUvygzIfJisc-JIE16SoAh9_3m9kontwrvCj_aCYnmN5PP49QdiBAI_lzex583BOGpL827mAxF9k1Lwn-IV-lod4D3cHP6msOHs04ENROzOw8YCuJeTE4n5feTC8Fc2vRW0__-Vi7PqE5F6OcXi3zQ744dh_DOn_O9cXi0tsxaoxjn7Qh3QYhppStlM3jjb1D4Wh9BuNb6557fESoBEPVVKVH-BMI1FQxzt0854WlHjK0GN2NIlOa0TiR5ulmGYMXEepvBFIWNCYUCavmzB6RyjLbXfCIXhucch35XOjf5xUPpqPWtXuO6OQeSo23ckxfFLWgFvSvRzpGBS0hCD3s-5eCMV8z4dtNqeDLAv09Lrui66bgUAqtFRArWFEYkDaoLhI',
        ])->json('POST', '/api/orders/store', [
            'email' => 'test@test.com',
            'amount' => '1000',
            'origin_id' => 2,
            'end_id' => 1,
        ]);
        $record = Order::latest('created_at')->first();
        $response
            ->assertStatus(200)
            ->assertJson([
                'order_reference_code' => $record->order_reference_code
            ]);
    }
}