// Generated by view binder compiler. Do not edit!
package com.example.alaminu.databinding;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.cardview.widget.CardView;
import androidx.viewbinding.ViewBinding;
import com.example.alaminu.R;
import java.lang.NullPointerException;
import java.lang.Override;

public final class ItemAktivitasBinding implements ViewBinding {
  @NonNull
  private final CardView rootView;

  private ItemAktivitasBinding(@NonNull CardView rootView) {
    this.rootView = rootView;
  }

  @Override
  @NonNull
  public CardView getRoot() {
    return rootView;
  }

  @NonNull
  public static ItemAktivitasBinding inflate(@NonNull LayoutInflater inflater) {
    return inflate(inflater, null, false);
  }

  @NonNull
  public static ItemAktivitasBinding inflate(@NonNull LayoutInflater inflater,
      @Nullable ViewGroup parent, boolean attachToParent) {
    View root = inflater.inflate(R.layout.item_aktivitas, parent, false);
    if (attachToParent) {
      parent.addView(root);
    }
    return bind(root);
  }

  @NonNull
  public static ItemAktivitasBinding bind(@NonNull View rootView) {
    if (rootView == null) {
      throw new NullPointerException("rootView");
    }

    return new ItemAktivitasBinding((CardView) rootView);
  }
}
