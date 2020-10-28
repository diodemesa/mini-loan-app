<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Loan;
  

class Loans extends Component
{
    public $loans, $amount_reqd, $terms, $loan_id, $user_id, $status;
    public $isOpen = 0;

    public function render()
    {
        $user = auth()->user();

        if($user->is_approver) {
            $this->loans = Loan::all();
        } else{
            $this->loans = Loan::where('user_id','=',$user->id)->get();
        }

        return view('livewire.loans');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->amount_reqd = '';
        $this->terms = '';
        $this->status = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'amount_reqd' => 'required',
            'terms' => 'required',
        ]);
   
        $data = [
            'amount_reqd' => $this->amount_reqd,
            'terms' => $this->terms,
            'user_id' => auth()->user()->id,
        ];
        if( ($this->status != "" ) ) $data['status'] = $this->status;
        Loan::updateOrCreate(['loan_id' => $this->loan_id], $data);
  
        session()->flash('message', 
            $this->loan_id ? 'Loan Updated Successfully.' : 'Loan Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // public function edit($id)
    // {
    //     $post = Post::findOrFail($id);
    //     $this->post_id = $id;
    //     $this->title = $post->title;
    //     $this->body = $post->body;
    
    //     $this->openModal();
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        $this->loan_id = $loan_id;
        $this->amount_reqd = $loan->amount_reqd;
        $this->terms = $loan->terms;
        $this->status = $loan->status;
    
        $this->openModal();
    }
     
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // public function delete($id)
    // {
    //     Post::find($id)->delete();
    //     session()->flash('message', 'Post Deleted Successfully.');
    // }
}