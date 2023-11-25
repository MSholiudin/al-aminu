// Generated by view binder compiler. Do not edit!
package com.example.alaminu.databinding;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.viewbinding.ViewBinding;
import androidx.viewbinding.ViewBindings;
import com.example.alaminu.R;
import java.lang.NullPointerException;
import java.lang.Override;
import java.lang.String;

public final class ActivityLoginBinding implements ViewBinding {
  @NonNull
  private final ConstraintLayout rootView;

  @NonNull
  public final TextView atau;

  @NonNull
  public final Button btngoogle;

  @NonNull
  public final Button btnmasuk;

  @NonNull
  public final EditText email;

  @NonNull
  public final ImageView emil;

  @NonNull
  public final ImageView imageView;

  @NonNull
  public final ImageView key;

  @NonNull
  public final TextView login;

  @NonNull
  public final TextView lupa;

  @NonNull
  public final TextView or;

  @NonNull
  public final EditText pass;

  private ActivityLoginBinding(@NonNull ConstraintLayout rootView, @NonNull TextView atau,
      @NonNull Button btngoogle, @NonNull Button btnmasuk, @NonNull EditText email,
      @NonNull ImageView emil, @NonNull ImageView imageView, @NonNull ImageView key,
      @NonNull TextView login, @NonNull TextView lupa, @NonNull TextView or,
      @NonNull EditText pass) {
    this.rootView = rootView;
    this.atau = atau;
    this.btngoogle = btngoogle;
    this.btnmasuk = btnmasuk;
    this.email = email;
    this.emil = emil;
    this.imageView = imageView;
    this.key = key;
    this.login = login;
    this.lupa = lupa;
    this.or = or;
    this.pass = pass;
  }

  @Override
  @NonNull
  public ConstraintLayout getRoot() {
    return rootView;
  }

  @NonNull
  public static ActivityLoginBinding inflate(@NonNull LayoutInflater inflater) {
    return inflate(inflater, null, false);
  }

  @NonNull
  public static ActivityLoginBinding inflate(@NonNull LayoutInflater inflater,
      @Nullable ViewGroup parent, boolean attachToParent) {
    View root = inflater.inflate(R.layout.activity_login, parent, false);
    if (attachToParent) {
      parent.addView(root);
    }
    return bind(root);
  }

  @NonNull
  public static ActivityLoginBinding bind(@NonNull View rootView) {
    // The body of this method is generated in a way you would not otherwise write.
    // This is done to optimize the compiled bytecode for size and performance.
    int id;
    missingId: {
      id = R.id.atau;
      TextView atau = ViewBindings.findChildViewById(rootView, id);
      if (atau == null) {
        break missingId;
      }

      id = R.id.btngoogle;
      Button btngoogle = ViewBindings.findChildViewById(rootView, id);
      if (btngoogle == null) {
        break missingId;
      }

      id = R.id.btnmasuk;
      Button btnmasuk = ViewBindings.findChildViewById(rootView, id);
      if (btnmasuk == null) {
        break missingId;
      }

      id = R.id.email;
      EditText email = ViewBindings.findChildViewById(rootView, id);
      if (email == null) {
        break missingId;
      }

      id = R.id.emil;
      ImageView emil = ViewBindings.findChildViewById(rootView, id);
      if (emil == null) {
        break missingId;
      }

      id = R.id.imageView;
      ImageView imageView = ViewBindings.findChildViewById(rootView, id);
      if (imageView == null) {
        break missingId;
      }

      id = R.id.key;
      ImageView key = ViewBindings.findChildViewById(rootView, id);
      if (key == null) {
        break missingId;
      }

      id = R.id.login;
      TextView login = ViewBindings.findChildViewById(rootView, id);
      if (login == null) {
        break missingId;
      }

      id = R.id.lupa;
      TextView lupa = ViewBindings.findChildViewById(rootView, id);
      if (lupa == null) {
        break missingId;
      }

      id = R.id.or;
      TextView or = ViewBindings.findChildViewById(rootView, id);
      if (or == null) {
        break missingId;
      }

      id = R.id.pass;
      EditText pass = ViewBindings.findChildViewById(rootView, id);
      if (pass == null) {
        break missingId;
      }

      return new ActivityLoginBinding((ConstraintLayout) rootView, atau, btngoogle, btnmasuk, email,
          emil, imageView, key, login, lupa, or, pass);
    }
    String missingId = rootView.getResources().getResourceName(id);
    throw new NullPointerException("Missing required view with ID: ".concat(missingId));
  }
}
